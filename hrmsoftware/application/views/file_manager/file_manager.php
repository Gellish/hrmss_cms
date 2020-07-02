<?php
/*
* Files Manager view
*/
$session = $this->session->userdata('username');
?>
<?php $file_setting = $this->Xin_model->read_file_setting_info(1);?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']);?>
<?php if($user[0]->user_role_id==1){
	$all = 'department-file';
	$val = '0';
} else {
	
	if($file_setting[0]->is_enable_all_files=='yes'):
		$val = '0';
		$all = 'department-file';
	else:
		$val = $user[0]->department_id;
		$all = 'not-allowed';
	endif;
}
?>

<div class="row m-b-1">
  <input type="hidden" id="depval" value="<?php echo $val;?>" />
  <div class="col-md-3">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_departments');?></strong></h2>
      <ul class="nav nav-4 nav-tabs-link-cl">
        <li class="nav-item nav-item-link" id="config_0"> <a href="javascript:void(0);" class="<?php echo $all;?> nav-link nav-tabs-link" data-department-id="0" data-config="0"><?php echo $this->lang->line('xin_all_departments');?></a></li>
        <?php foreach($all_departments as $department):?>
        <?php if($user[0]->user_role_id==1){?>
        <li class="nav-item nav-item-link" id="config_<?php echo $department->department_id;?>"> <a href="javascript:void(0);" class="department-file nav-link nav-tabs-link" data-department-id="<?php echo $department->department_id;?>" data-config="<?php echo $department->department_id;?>"><?php echo $department->department_name;?></a></li>
        <?php } else {?>
        <?php
		  	if($user[0]->department_id==$department->department_id){
				$dep_all = 'department-file';
			} else {
				if($file_setting[0]->is_enable_all_files=='yes'):
					$dep_all = 'department-file';
				else:
					$dep_all = 'not-allowed';
				endif;
			}
		  ?>
        <li class="nav-item nav-item-link" id="config_<?php echo $department->department_id;?>"> <a href="javascript:void(0);" class="<?php echo $dep_all;?> nav-link nav-tabs-link" data-department-id="<?php echo $department->department_id;?>" data-config="<?php echo $department->department_id;?>"><?php echo $department->department_name;?></a></li>
        <?php } ?>
        <?php endforeach;?>
      </ul>
    </div>
  </div>
  <div class="col-md-9">
    <div class="box box-block bg-white">
      <div class="wizard" role="tabpanel">
        <ul class="nav nav-tabs m-b-1" role="tablist">
          <li class="nav-item"> <a class="nav-link active all-files" data-toggle="tab" href="#all_files" role="tab"><i class="fa fa-home"></i> All <?php echo $this->lang->line('xin_files');?></a> </li>
        </ul>
        <div class="tab-content m-b-1">
          <div role="tabpanel" class="tab-all-files tab-pane animated fadeInRight active fade in" id="all_files">
            <div class="box-block bg-white">
              <form id="xin-form" action="<?php echo site_url("files/add_files") ?>" enctype="multipart/form-data" name="add_files" method="post">
                <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
                <div class="row">
                  <?php if($user[0]->user_role_id==1){?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="department_id"><?php echo $this->lang->line('left_department');?></label>
                      <select name="department_id" id="department_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_department');?>">
                        <option value=""></option>
                        <?php foreach($all_departments as $department) {?>
                        <option value="<?php echo $department->department_id;?>"> <?php echo $department->department_name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <?php } else { ?>
                  <input type="hidden" name="department_id" id="department_id" value="<?php echo $user[0]->department_id;?>" />
                  <?php } ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6><?php echo $this->lang->line('xin_e_details_document_file');?></h6>
                      <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
                      <input type="file" name="xin_file" id="xin_file">
                      </span><br />
                      <small><?php echo $this->lang->line('xin_upload_file_only_for_resume');?>: <?php echo $file_setting[0]->allowed_extensions;?></small></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="box-block bg-white">
              <div class="table-responsive" data-pattern="priority-columns">
                <table class="table table-striped table-bordered dataTable" id="xin_table_files" style="width:100%;">
                  <thead>
                    <tr>
                      <th><?php echo $this->lang->line('xin_action');?></th>
                      <th><?php echo $this->lang->line('xin_single_file');?></th>
                      <th><?php echo $this->lang->line('left_department');?></th>
                      <th><?php echo $this->lang->line('xin_single_size');?></th>
                      <th><?php echo $this->lang->line('xin_extension');?></th>
                      <th><?php echo $this->lang->line('xin_uploaded_date');?></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          <!-- tab --> 
        </div>
      </div>
    </div>
  </div>
</div>
