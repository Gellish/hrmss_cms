<?php
/* Task Details view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $u_created = $this->Xin_model->read_user_info($session['user_id']);?>
<?php $assigned_ids = explode(',',$assigned_to);?>

<div class="row m-b-1">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h5><?php echo $this->lang->line('xin_task_detail');?></h5>
      <table class="table table-striped m-md-b-0">
        <tbody>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_task_title');?></th>
            <td class="text-right"><?php echo $task_name;?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_project');?></th>
            <td class="text-right"><?php echo $project_name;?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_created_by');?></th>
            <td class="text-right"><?php echo $created_by;?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_start_date');?></th>
            <td class="text-right"><?php echo $this->Xin_model->set_date_format($start_date);?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_end_date');?></th>
            <td class="text-right"><?php echo $this->Xin_model->set_date_format($end_date);?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_hours');?></th>
            <td class="text-right"><?php echo $task_hour;?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php if($u_created[0]->user_role_id==1){?>
    <!-- assigned to-->
    <div class="box box-block bg-white">
      <h5><?php echo $this->lang->line('xin_assigned_to');?></h5>
      <div class="row">
        <form action="<?php echo site_url("timesheet/assign_task") ?>" method="post" name="assign_task" id="assign_task">
          <input type="hidden" name="task_id" id="task_id" value="<?php echo $task_id;?>">
          <div class="box-block">
            <div class="form-group">
              <label for="employees" class="control-label"><?php echo $this->lang->line('dashboard_single_employee');?></label>
              <select multiple class="form-control" name="assigned_to[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_single_employee');?>">
                <?php foreach($all_employees as $employee) {?>
                <option value="<?php echo $employee->user_id?>" <?php if(in_array($employee->user_id,$assigned_ids)):?> selected <?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
          </div>
        </form>
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <div class="wizard" role="tabpanel">
        <ul class="nav nav-tabs m-b-1" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detail" role="tab"><i class="fa fa-home"></i> <?php echo $this->lang->line('xin_details');?></a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#comment" role="tab"><i class="fa fa-comment"></i> <?php echo $this->lang->line('xin_discussion');?></a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#notebook" role="tab"><i class="fa fa-pencil"></i> <?php echo $this->lang->line('xin_note');?></a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#attachment" role="tab"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('xin_task_files');?></a> </li>
        </ul>
        <div class="tab-content m-b-1">
          <div role="tabpanel" class="tab-pane animated fadeInRight active fade in" id="detail" style="overflow:auto;">
            <div class="info">
              <blockquote class="blockquote mb-1 mb-md-0"> <?php echo html_entity_decode($description);?> </blockquote>
            </div>
            <div class="col-md-6">
              <h2><strong><?php echo $this->lang->line('xin_assigned_to');?></strong></h2>
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
                  <a class="text-black" href="<?php echo site_url();?>employees/detail/<?php echo $e_name[0]->user_id;?>/">
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
            <div class="col-md-6">
              <form action="<?php echo site_url("timesheet/update_task_status") ?>" method="post" name="update_status" id="update_status">
                <input type="hidden" name="task_id" value="<?php echo $task_id;?>">
                <input type="hidden" id="progres_val" name="progres_val" value="<?php echo $progress;?>">
                <h2><strong><?php echo $this->lang->line('xin_update_status');?></strong></h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="progress"><?php echo $this->lang->line('dashboard_xin_progress');?></label>
                      <input type="text" id="range_grid">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                      <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="Status">
                        <option value="0" <?php if($task_status=='0'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_not_started');?></option>
                        <option value="1" <?php if($task_status=='1'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_in_progress');?></option>
                        <option value="2" <?php if($task_status=='2'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_completed');?></option>
                        <option value="3" <?php if($task_status=='3'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_deffered');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
              </form>
            </div>
            <div>&nbsp;</div>
          </div>
          <div role="tabpanel" class="tab-pane animated fadeInRight fade" id="comment">
            <form action="<?php echo site_url("timesheet/set_comment") ?>" method="post" name="set_comment" id="set_comment">
              <input type="hidden" name="comment_task_id" id="comment_task_id" value="<?php echo $task_id;?>">
              <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
              <div class="box-block">
                <div class="form-group">
                  <textarea name="xin_comment" id="xin_comment" class="form-control" rows="4" placeholder="<?php echo $this->lang->line('xin_message_here');?>"></textarea>
                </div>
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
              </div>
            </form>
            <div class="clear"></div>
            <div class="table-responsive">
              <table class="table table-hover mb-md-0" id="xin_comment_table" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_all_comments');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane animated fadeInRight fade" id="attachment">
            <form action="<?php echo site_url("timesheet/add_attachment") ?>" enctype="multipart/form-data" method="post" name="add_attachment" id="add_attachment">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
              <input type="hidden" name="c_task_id" id="c_task_id" value="<?php echo $task_id;?>">
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
          <div role="tabpanel" class="tab-pane animated fadeInRight fade" id="notebook">
            <form action="<?php echo site_url("timesheet/add_note") ?>" method="post" name="add_note" id="add_note">
              <input type="hidden" name="note_task_id" id="note_task_id" value="<?php echo $task_id;?>">
              <input type="hidden" name="_uid" value="<?php echo $session['user_id'];?>">
              <div class="box-block">
                <div class="form-group">
                  <textarea name="task_note" id="task_note" class="form-control" rows="7" placeholder="<?php echo $this->lang->line('xin_task_note');?>"><?php echo $task_note;?></textarea>
                </div>
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
              </div>
            </form>
          </div>
          <!-- tab --> 
        </div>
      </div>
    </div>
  </div>
</div>
