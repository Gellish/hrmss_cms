<?php
/* Project Details view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $u_created = $this->Xin_model->read_user_info($session['user_id']);?>
<?php $assigned_ids = explode(',',$assigned_to);?>
<?php
//status
if($status == 0) {
	$nstatus = $this->lang->line('xin_not_started');
} else if($status ==1){
	$nstatus = $this->lang->line('xin_in_progress');
} else if($status ==2){
	$nstatus = $this->lang->line('xin_completed');
} else {
	$nstatus = $this->lang->line('xin_deffered');
}
//priority
if($priority == 1) {
	$epriority = '<span class="tag tag-danger">'.$this->lang->line('xin_highest').'</span>';
} else if($priority ==2){
	$epriority = '<span class="tag tag-warning">'.$this->lang->line('xin_high').'</span>';
} else if($priority ==3){
	$epriority = '<span class="tag tag-primary">'.$this->lang->line('xin_normal').'</span>';
} else {
	$epriority = '<span class="tag tag-success">'.$this->lang->line('xin_low').'</span>';
}
?>

<div class="row m-b-1">
  <div class="col-md-3">
    <div class="box bg-white">
      <ul class="nav nav-4">
        <li class="nav-item nav-item-link"> <span class="nav-link" href="#setting" data-config="0" data-toggle="tab" aria-expanded="true"> <strong><?php echo $this->lang->line('xin_project_detail');?></strong> </span> </li>
        <li class="nav-item nav-item-link active-link" id="config_1"> <a class="nav-link nav-tabs-link" href="#overview" data-config="1" data-config-block="overview" data-toggle="tab" aria-expanded="true"> <i class="ti-home"></i> <?php echo $this->lang->line('xin_overview');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_2"> <a class="nav-link nav-tabs-link" href="#assigned" data-config="2" data-config-block="assigned" data-toggle="tab" aria-expanded="true"> <i class="fa fa-wechat"></i> <?php echo $this->lang->line('xin_assigned_to');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_3"> <a class="nav-link nav-tabs-link" href="#progress" data-config="3" data-config-block="progress" data-toggle="tab" aria-expanded="true"> <i class="fa fa-envira"></i> <?php echo $this->lang->line('dashboard_xin_progress');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_4"> <a class="nav-link nav-tabs-link" href="#discussion" data-config="4" data-config-block="discussion" data-toggle="tab" aria-expanded="true"> <i class="fa fa-wechat"></i> <?php echo $this->lang->line('xin_discussion');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_5"> <a class="nav-link nav-tabs-link" href="#bugs" data-config="5" data-config-block="bugs" data-toggle="tab" aria-expanded="true"> <i class="fa fa-cogs"></i> <?php echo $this->lang->line('xin_bugs_issues');?> </a> </li>
        <?php if($u_created[0]->user_role_id==1) { ?>
        <li class="nav-item nav-item-link" id="config_6"> <a class="nav-link nav-tabs-link" href="#tasks" data-config="6" data-config-block="tasks" data-toggle="tab" aria-expanded="true"> <i class="fa fa-key"></i> <?php echo $this->lang->line('xin_tasks');?> </a> </li>
        <?php } ?>
        <li class="nav-item nav-item-link" id="config_7"> <a class="nav-link nav-tabs-link" href="#files" data-config="7" data-config-block="files" data-toggle="tab" aria-expanded="true"> <i class="fa fa-book"></i> <?php echo $this->lang->line('xin_files');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_8"> <a class="nav-link nav-tabs-link" href="#note" data-config="8" data-config-block="note" data-toggle="tab" aria-expanded="true"> <i class="ti-email"></i> <?php echo $this->lang->line('xin_note');?> </a> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="overview"  aria-expanded="false">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block bg-white tile tile-4 mb-2">
          <div class="t-icon left bg-info"><i class="fa fa-tasks"></i></div>
          <div class="t-content text-xs-right">
            <h6 class="text-uppercase"><?php echo $this->lang->line('xin_total_tasks');?></h6>
            <h1 class="mb-0"><?php echo $this->Project_model->total_project_tasks($project_id);?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block bg-white tile tile-4 mb-2">
          <div class="t-icon left bg-danger"><i class="fa fa-bug"></i></div>
          <div class="t-content text-xs-right">
            <h6 class="text-uppercase"><?php echo $this->lang->line('xin_bugs_issues');?></h6>
            <h1 class="mb-0"><?php echo $this->Project_model->total_project_bugs($project_id);?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block bg-white tile tile-4 mb-2">
          <div class="t-icon left bg-success"><i class="fa fa-bug"></i></div>
          <div class="t-content text-xs-right">
            <h6 class="text-uppercase"><?php echo $this->lang->line('xin_total_members');?></h6>
            <h1 class="mb-0"><?php echo count($assigned_ids);?></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project_overview');?></strong> - <?php echo $title;?></h2>
      <div class="row">
        <div class="col-sm-12">
          <div class="info">
            <blockquote class="blockquote mb-1 mb-md-0"> <?php echo html_entity_decode($description);?> </blockquote>
          </div>
          <hr />
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"> <?php echo $this->lang->line('dashboard_xin_status');?>: <?php echo $nstatus;?> </div>
        <div class="col-md-3"> <?php echo $this->lang->line('xin_start_date');?>: <i class="fa fa-calendar position-left"></i> <?php echo $this->Xin_model->set_date_format($start_date);?> </div>
        <div class="col-md-3"> <?php echo $this->lang->line('xin_end_date');?>: <i class="fa fa-calendar position-left"></i> <?php echo $this->Xin_model->set_date_format($end_date);?> </div>
        <div class="col-md-3"> <?php echo $this->lang->line('xin_p_priority');?>: <?php echo $epriority;?> </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="assigned"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_assigned');?> </strong><?php echo $this->lang->line('xin_users');?></h2>
      <div class="row">
        <?php if($u_created[0]->user_role_id==1){?>
        <!-- assigned to-->
        <div class="col-md-6">
          <div class="card-header text-uppercase"><b><?php echo $this->lang->line('xin_update_users');?></b></div>
          <form action="<?php echo site_url("project/assign_project") ?>" method="post" name="assign_project" id="assign_project">
            <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id;?>">
            <div class="box-block">
              <div class="form-group">
                <label for="employees" class="control-label"><?php echo $this->lang->line('xin_employee');?></label>
                <select multiple class="form-control" name="assigned_to[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee');?>">
                  <?php foreach($all_employees as $employee) {?>
                  <option value="<?php echo $employee->user_id?>" <?php if(in_array($employee->user_id,$assigned_ids)):?> selected <?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                  <?php } ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </div>
          </form>
        </div>
        <?php } ?>
        <div class="col-md-6">
          <div class="card-header text-uppercase"><b><?php echo $this->lang->line('xin_assigned_to');?></b></div>
          <div class="items-list" id="all_employees_list">
            <?php if($assigned_to!='' && $assigned_to!='None') {?>
            <?php $employee_ids = explode(',',$assigned_to); foreach($employee_ids as $assign_id) {?>
            <?php $e_name = $this->Xin_model->read_user_info($assign_id);?>
            <?php if(!is_null($e_name)){ ?>
            <?php $_designation = $this->Designation_model->read_designation_information($e_name[0]->designation_id);?>
            <?php
			  if(!is_null($_designation)){
				$designation_name = $_designation[0]->designation_name;
			  } else {
				$designation_name = '--';	
			  }
			  ?>
            <?php
				if($e_name[0]->profile_picture!='' && $e_name[0]->profile_picture!='no file') {
					$u_file = base_url().'uploads/profile/'.$e_name[0]->profile_picture;
				} else {
					if($e_name[0]->gender=='Male') { 
						$u_file = base_url().'uploads/profile/default_male.jpg';
					} else {
						$u_file = base_url().'uploads/profile/default_female.jpg';
					}
				} ?>
            <div class="il-item">
              <?php if($u_created[0]->user_role_id==1):?>
              <a class="text-black" href="<?php echo site_url();?>employees/detail/<?php echo $e_name[0]->user_id;?>">
              <?php endif; ?>
              <div class="media">
                <div class="media-left">
                  <div class="avatar box-48"> <img class="b-a-radius-circle" src="<?php echo $u_file;?>" alt=""> <i class="status bg-secondary bottom right"></i> </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><?php echo $e_name[0]->first_name.' '.$e_name[0]->last_name;?></h6>
                  <span class="text-muted"><?php echo $designation_name;?></span> </div>
              </div>
              <div class="il-icon"><i class="fa fa-angle-right"></i></div>
              <?php if($u_created[0]->user_role_id==1):?>
              </a>
              <?php endif; ?>
            </div>
            <?php } } ?>
            <?php } else { ?>
            <span>&nbsp;</span>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="progress"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project');?> </strong><?php echo $this->lang->line('dashboard_xin_progress');?></h2>
      <form action="<?php echo site_url("project/update_status") ?>" method="post" name="update_status" id="update_status">
        <div class="row">
          <div class="col-md-6">
            <input type="hidden" name="project_id" value="<?php echo $project_id;?>">
            <input type="hidden" id="progres_val" name="progres_val" value="<?php echo $progress;?>">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="progress"><?php echo $this->lang->line('dashboard_xin_progress');?></label>
                  <input type="text" id="range_grid">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                  <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="Status">
                    <option value="0" <?php if($status=='0'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_not_started');?></option>
                    <option value="1" <?php if($status=='1'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_in_progress');?></option>
                    <option value="2" <?php if($status=='2'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_completed');?></option>
                    <option value="3" <?php if($status=='3'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_deffered');?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="status"><?php echo $this->lang->line('xin_p_priority');?></label>
                  <select class="form-control" name="priority" data-plugin="select_hrm" data-placeholder="Priority">
                    <option value="1" <?php if($priority=='1'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_highest');?></option>
                    <option value="2" <?php if($priority=='2'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_high');?></option>
                    <option value="3" <?php if($priority=='3'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_normal');?></option>
                    <option value="4" <?php if($priority=='4'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_low');?></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </form>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="discussion"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project');?> </strong><?php echo $this->lang->line('xin_discussion');?></h2>
      <form action="<?php echo site_url("project/set_discussion") ?>" method="post" name="set_discussion" id="set_discussion">
        <input type="hidden" name="discussion_project_id" id="discussion_project_id" value="<?php echo $project_id;?>">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <div class="box-block">
          <div class="form-group">
            <textarea name="xin_message" id="xin_message" class="form-control" rows="4" placeholder="<?php echo $this->lang->line('xin_message');?>"></textarea>
          </div>
          <div class="form-group"> <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_attachment');?>
            <input type="file" name="attachment_discussion" id="attachment_discussion">
            </span> </div>
          <div class="row">
            <div class="col-md-12">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="clear"></div>
      <div class="table-responsive">
        <table class="table table-hover mb-md-0" id="xin_discussion_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_all_discussions');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="bugs"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project');?> </strong><?php echo $this->lang->line('xin_bugs_issues');?></h2>
      <form action="<?php echo site_url("project/set_bug") ?>" method="post" name="set_bug" id="set_bug">
        <input type="hidden" name="bug_project_id" id="bug_project_id" value="<?php echo $project_id;?>">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <div class="box-block">
          <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title');?>">
          </div>
          <div class="form-group"> <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_attachment');?>
            <input type="file" name="attachment" id="attachment">
            </span> </div>
          <div class="row">
            <div class="col-md-12">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="clear"></div>
      <div class="table-responsive">
        <table class="table table-hover mb-md-0" id="xin_bug_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_all_bugs_issues');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php if($u_created[0]->user_role_id==1) { ?>
  <div class="col-md-9 current-tab animated fadeInRight" id="tasks"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project');?> </strong><?php echo $this->lang->line('xin_tasks');?></h2>
      <form action="<?php echo site_url("timesheet/add_task") ?>"method="post" name="add_task" id="xin-form">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="type" value="1" />
        <div class="box-block">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="task_name"><?php echo $this->lang->line('dashboard_xin_title');?></label>
                <input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title');?>" name="task_name" type="text" value="">
              </div>
              <div class="row">
                <input type="hidden" name="project_id" id="tproject_id" value="<?php echo $project_id;?>" />
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                    <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                    <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="task_hour" class="control-label"><?php echo $this->lang->line('xin_estimated_hour');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_estimated_hour');?>" name="task_hour" type="text" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="15" id="description"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="employees" class="control-label"><?php echo $this->lang->line('xin_assigned_to');?></label>
                <select multiple class="form-control" name="assigned_to[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_single_employee');?>">
                  <option value=""></option>
                  <?php foreach($all_employees as $employee) {?>
                  <option value="<?php echo $employee->user_id?>"> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="clear"></div>
      <div class="table-responsive">
        <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
              <th><?php echo $this->lang->line('xin_end_date');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('xin_assigned_to');?></th>
              <th><?php echo $this->lang->line('xin_created_by');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-md-9 current-tab animated fadeInRight" id="files"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project');?> </strong><?php echo $this->lang->line('xin_files');?></h2>
      <form action="<?php echo site_url("project/add_attachment") ?>" enctype="multipart/form-data" method="post" name="add_attachment" id="add_attachment">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="project_id" id="f_project_id" value="<?php echo $project_id;?>">
        <input type="hidden" name="type" value="2" />
        <div class="bg-white">
          <div class="box-block">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="task_name"><?php echo $this->lang->line('dashboard_xin_title');?></label>
                  <input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title');?>" name="file_name" type="text" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class='form-group'>
                  <h6><?php echo $this->lang->line('xin_attachment_file');?></h6>
                  <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
                  <input type="file" name="attachment_file" id="attachment_file">
                  </span> <br>
                  <small><?php echo $this->lang->line('xin_project_files_upload');?></small> </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                  <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description');?>" name="file_description" rows="4" id="file_description"></textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
          </div>
        </div>
      </form>
      <div class="clear"></div>
      <h2><strong><?php echo $this->lang->line('xin_attachment_list');?></strong></h2>
      <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered table-ajax-load" id="xin_attachment_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_option');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
              <th><?php echo $this->lang->line('xin_description');?></th>
              <th><?php echo $this->lang->line('xin_date_and_time');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="note"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_project');?> </strong><?php echo $this->lang->line('xin_note');?></h2>
      <form action="<?php echo site_url("project/add_note") ?>" method="post" name="add_note" id="add_note">
        <input type="hidden" name="note_project_id" id="note_project_id" value="<?php echo $project_id;?>">
        <input type="hidden" name="_uid" value="<?php echo $session['user_id'];?>">
        <div class="box-block">
          <div class="form-group">
            <textarea name="project_note" id="project_note" class="form-control" rows="12" placeholder="<?php echo $this->lang->line('xin_project_note');?>"><?php echo $project_note;?></textarea>
          </div>
          <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
