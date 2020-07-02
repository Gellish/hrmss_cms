<?php
$session = $this->session->userdata('username');
$system = $this->Xin_model->read_setting_info(1);
$user_info = $this->Xin_model->read_user_info($session['user_id']);
$role_user = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);

if(!is_null($role_user)){
	$role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
	$role_resources_ids = explode(',',0);	
}


if($system[0]->system_skin=='skin-default'){
	$cl_skin = 'light';
} else if($system[0]->system_skin=='skin-1'){
	$cl_skin = 'dark';
} else if($system[0]->system_skin=='skin-2'){
	$cl_skin = 'light';
} else if($system[0]->system_skin=='skin-3'){
	$cl_skin = 'light';
} else if($system[0]->system_skin=='skin-4'){
	$cl_skin = 'dark';
} else if($system[0]->system_skin=='skin-5'){
	$cl_skin = 'dark';
} else if($system[0]->system_skin=='skin-6'){
	$cl_skin = 'dark';
}
?>
<?php $site_lang = $this->load->helper('language');?>
<?php $wz_lang = $site_lang->session->userdata('site_lang');?>
<?php if($user_info[0]->user_role_id==1) { ?>
<div class="template-options">
  <div class="to-toggle"><i class="ti-settings"></i></div>
  <div class="custom-scroll custom-scroll-dark">
  <ul class="nav nav-tabs nav-tabs-2 m-b-0-5" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#layout" role="tab" aria-expanded="true"><?php echo $this->lang->line('xin_layout_settings');?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab_setting" role="tab" aria-expanded="false"><?php echo $this->lang->line('xin_other_settings');?></a>
        </li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="layout" role="tabpanel" aria-expanded="true">            
    <form id="layout_skin_info" action="<?php echo site_url("settings/layout_skin_info");?>/" name="layout_skin_info" method="post">
      <input type="hidden" name="token" value="1DR59ik46kLKR4E" />
      <div class="to-content">
      <?php if($system[0]->enable_layout=='yes'):?>
        <h5><strong><?php echo $this->lang->line('header_layouts');?></strong></h5>
        <div class="row text-xs-center">
          <div class="col-xs-6 mb-2">
            <div class="to-item">
              <label>
              <input name="fixed-header" type="checkbox" value="fixed-header" <?php if($system[0]->fixed_header!=''){?> checked="checked" <?php } ?>>
              <div class="to-icon"><i class="ti-check"></i></div>
              <img src="<?php echo base_url();?>skin/img/layouts/fixed-header.png" class="img-fluid">
              </label>
              <div class="text-muted"><?php echo $this->lang->line('header_fixed_header');?></div>
            </div>
          </div>
          <div class="col-xs-6 mb-2">
            <div class="to-item">
              <label>
              <input name="fixed-sidebar" type="checkbox" value="fixed-sidebar" <?php if($system[0]->fixed_sidebar!=''){?> checked="checked" <?php } ?>>
              <div class="to-icon"><i class="ti-check"></i></div>
              <img src="<?php echo base_url();?>skin/img/layouts/sticky-sidebar.png" class="img-fluid">
              </label>
              <div class="text-muted"><?php echo $this->lang->line('header_fixed_sidebar');?></div>
            </div>
          </div>
          <div class="col-xs-6 mb-2">
            <div class="to-item">
              <label>
              <input name="boxed-wrapper" type="checkbox" value="boxed-wrapper" <?php if($system[0]->boxed_wrapper!=''){?> checked="checked" <?php } ?>>
              <div class="to-icon"><i class="ti-check"></i></div>
              <img src="<?php echo base_url();?>skin/img/layouts/boxed-wrapper.png" class="img-fluid">
              </label>
              <div class="text-muted"><?php echo $this->lang->line('header_boxed_wrapper');?></div>
            </div>
          </div>
          <div class="col-xs-6 mb-2">
            <div class="to-item">
              <label>
              <input name="static" type="checkbox" value="static" <?php if($system[0]->layout_static!=''){?> checked="checked" <?php } ?>>
              <div class="to-icon"><i class="ti-check"></i></div>
              <img src="<?php echo base_url();?>skin/img/layouts/static.png" class="img-fluid">
              </label>
              <div class="text-muted"><?php echo $this->lang->line('header_static');?></div>
            </div>
          </div>
        </div>
        <?php endif;?>
        <h5><strong><?php echo $this->lang->line('header_skins');?></strong></h5>
        <div class="row">
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-default" type="radio" <?php if($system[0]->system_skin=='skin-default'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="skin-dark-blue"></span> <span class="skin-white"></span> <span class="skin-dark-blue"></span> </div>
            </label>
          </div>
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-1" type="radio" <?php if($system[0]->system_skin=='skin-1'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="skin-dark-blue-2"></span> <span class="skin-dark-blue-2"></span> <span class="bg-white"></span> </div>
            </label>
          </div>
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-2" type="radio" <?php if($system[0]->system_skin=='skin-2'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="bg-danger"></span> <span class="bg-white"></span> <span class="bg-black"></span> </div>
            </label>
          </div>
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-3" type="radio" <?php if($system[0]->system_skin=='skin-3'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="bg-white"></span> <span class="bg-white"></span> <span class="bg-white"></span> </div>
            </label>
          </div>
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-4" type="radio" <?php if($system[0]->system_skin=='skin-4'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="bg-white"></span> <span class="skin-dark-blue-2"></span> <span class="bg-white"></span> </div>
            </label>
          </div>
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-5" type="radio" <?php if($system[0]->system_skin=='skin-5'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="bg-primary-light"></span> <span class="bg-primary"></span> <span class="bg-white"></span> </div>
            </label>
          </div>
          <div class="col-xs-3 mb-2">
            <label class="skin-label">
            <input name="skin" value="skin-6" type="radio" <?php if($system[0]->system_skin=='skin-6'){?> checked="checked" <?php } ?>>
            <div class="to-icon"><i class="ti-check"></i></div>
            <div class="to-skin"> <span class="bg-black"></span> <span class="bg-info"></span> <span class="bg-black"></span> </div>
            </label>
          </div>
        </div>
        <div class="to-material">
          <button type="submit" class="btn-block waves-effect waves-light mb-2 btn btn-primary save"><?php echo $this->lang->line('xin_update');?></button>
        </div>
      </div>
    </form></div>
    
    <div class="tab-pane" id="tab_setting" role="tabpanel">
    <form id="sidebar_setting_info" action="<?php echo site_url("settings/sidebar_setting_info");?>/" name="sidebar_setting_info" method="post">
      <input type="hidden" name="token" value="1DR59ik46kLKR4E" />
        <div class="sidebar-settings animated fadeIn">
            <div class="sidebar-group">
                <h6><?php echo $this->lang->line('dashboard_main');?></h6>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_enable_attendance_system');?></div>
                    <div class="ss-checkbox"><input type="checkbox" id="enable_attendance" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->enable_attendance=='yes'):?> checked="checked" <?php endif;?> value="yes"></div>
                </div>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_enable_jobs_for_employees');?></div>
                    <div class="ss-checkbox"><input type="checkbox" id="enable_job" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->enable_job_application_candidates=='yes'):?> checked="checked" <?php endif;?> value="yes"></div>
                </div>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_employee_can_change_profile_cover');?></div>
                    <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->enable_profile_background=='yes'):?> checked="checked" <?php endif;?> value="yes" id="enable_profile_background"></div>
                </div>
            </div>
            <div class="sidebar-group">
                <h6><?php echo $this->lang->line('xin_notifications');?></h6>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_email_notification_enable');?></div>
                    <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->enable_email_notification=='yes'):?> checked="checked" <?php endif;?> value="yes" id="role_email_notification"></div>
                </div>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_enable_notification_close_btn');?></div>
                    <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->notification_close_btn=='true'):?> checked="checked" <?php endif;?> value="true" id="close_btn"></div>
                </div>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_notification_progress_bar');?></div>
                    <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->notification_bar=='true'):?> checked="checked" <?php endif;?> value="true" id="notification_bar"></div>
                </div>
            </div>
            <div class="sidebar-group">
                <h6><?php echo $this->lang->line('xin_other');?></h6>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_enable_policy_link_top');?></div>
                    <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->enable_policy_link=='yes'):?> checked="checked" <?php endif;?> value="yes" id="role_policy_link"></div>
                </div>
                <div class="ss-item">
                    <div class="text-truncate"><?php echo $this->lang->line('xin_enable_layout_setting');?></div>
                    <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" <?php if($system[0]->enable_layout=='yes'):?> checked="checked" <?php endif;?> value="yes" id="enable_layout"></div>
                </div>
            </div>
        </div>
        <div class="to-material">
          <button type="submit" class="btn-block waves-effect waves-light mb-2 btn btn-primary save"><?php echo $this->lang->line('xin_update');?></button>
        </div>
        </form>
					</div>
                    
                    </div>
  </div>
</div>
<?php }?>
<div class="site-header">
  <nav class="navbar navbar-<?php echo $cl_skin;?>">
    <div class="navbar-left"> <a class="navbar-brand" href="<?php echo site_url();?>dashboard/"> 
      <!--Workable Zone-->
      <div class="logo"></div>
      </a>
      <div class="toggle-button <?php echo $cl_skin;?> sidebar-toggle-first float-xs-left hidden-md-up" data-toggle-tooltip="tooltip" data-placement="bottom" data-title="Sidebar" data-original-title="" title=""> <span class="hamburger"></span> </div>
      <div class="toggle-button <?php echo $cl_skin;?> float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1" data-toggle-tooltip="tooltip" data-placement="bottom" data-title="Sidebar" data-original-title="" title=""> <span class="more"></span> </div>
    </div>
    <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
      <div class="toggle-button <?php echo $cl_skin;?> sidebar-toggle-second float-xs-left hidden-sm-down" data-toggle-tooltip="tooltip" data-placement="bottom" data-title="Sidebar" data-original-title="" title=""> <span class="hamburger"></span> </div>
      <ul class="nav navbar-nav float-md-right">
        <li class="nav-item dropdown"> 
        <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false"> <img src="<?php echo base_url()?>skin/img/flags/<?php echo $this->Xin_model->get_selected_language_flag($wz_lang);?>" alt="<?php echo $this->Xin_model->get_selected_language_name($wz_lang);?>"> <?php echo $this->Xin_model->get_selected_language_name($wz_lang);?></a>
        <div class="dropdown-menu dropdown-menu-right animated <?php echo $system[0]->animation_effect_topmenu;?>">
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/chineese')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/cn.gif" alt="Chinese"> Chinese
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/danish')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/dk.gif" alt="Danish"> Danish
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/english')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/en.gif" alt="English"> English
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/french')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/fr.gif" alt="French"> French
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/german')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/de.gif" alt="German"> German
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/greek')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/gr.gif" alt="Greek"> Greek
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/indonesian')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/id.gif" alt="Indonesian"> Indonesian
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/italian')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/ie.gif" alt="Italian"> Italian
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/japanese')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/jp.gif" alt="Japanese"> Japanese
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/polish')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/pl.gif" alt="Polish"> Polish
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/portuguese')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/pt.gif" alt="Portuguese"> Portuguese
                </a> 
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/romanian')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/ro.gif" alt="Romanian"> Romanian
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/russian')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/ru.gif" alt="Spanish"> Russian
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/spanish')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/es.gif" alt="Spanish"> Spanish
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/turkish')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/tr.gif" alt="Spanish"> Turkish
                </a>
                <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/vietnamese')?>">
                    <img src="<?php echo base_url()?>skin/img/flags/vn.gif" alt="Vietnamese"> Vietnamese
                </a>         
            </div>
        </li>
        <?php if($system[0]->enable_policy_link=='yes'):?>
        <li class="nav-item"> <a class="nav-link" href="#" data-toggle="modal" data-target=".policy"> <i class="fa fa-product-hunt"></i> <span class="hidden-md-up ml-1"><?php echo $this->lang->line('header_policies');?></span></a> </li>
        <?php endif;?>
        <?php if($user_info[0]->user_role_id==1) {?>
        <li class="nav-item dropdown"> <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="ti-bell"></i> <span class="hidden-md-up ml-1"><?php echo $this->lang->line('header_notifications');?></span> </a>
          <div class="dropdown-messages dropdown-tasks dropdown-menu dropdown-menu-right animated <?php echo $system[0]->animation_effect_topmenu;?>">
            <?php foreach($this->Xin_model->get_last_leave_applications() as $leave_notify){?>
            <?php $employee_info = $this->Xin_model->read_user_info($leave_notify->employee_id);?>
            <?php
				if(!is_null($employee_info)){
					$emp_name = $employee_info[0]->first_name. ' '.$employee_info[0]->last_name;
				} else {
					$emp_name = '--';	
				}
			?>
            <?php //$el_type = $this->Xin_model->read_leave_type($leave_notify->leave_type_id);?>
            <div class="m-item">
              <div class="mi-icon bg-info"><i class="ti-comment"></i></div>
              <div class="mi-text"><a class="text-black" href="<?php echo site_url()?>timesheet/leave_details/id/<?php echo $leave_notify->leave_id;?>/"><?php echo $emp_name;?></a> <span class="text-muted"><?php echo $this->lang->line('header_has_applied_for_leave');?></span></div>
              <div class="mi-time"><?php echo $this->Xin_model->set_date_format($leave_notify->applied_on);?></div>
            </div>
            <?php } ?>
            <a class="dropdown-more" href="<?php echo site_url()?>timesheet/leave/"> <strong><?php echo $this->lang->line('header_view_all_leave');?></strong> </a> </div>
        </li>
        <?php } ?>
        <?php if(in_array('53',$role_resources_ids) || in_array('54',$role_resources_ids) || in_array('55',$role_resources_ids) || in_array('56',$role_resources_ids)){?>
        <li class="nav-item dropdown"> <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false" data-placement="bottom"> <i class="ti-settings"></i> <span class="hidden-md-up ml-1"><?php echo $this->lang->line('left_settings');?></span> </a>
          <div class="dropdown-menu dropdown-menu-right animated <?php echo $system[0]->animation_effect_topmenu;?>">
            <?php if(in_array('53',$role_resources_ids)){?>
            <a class="dropdown-item" href="<?php echo site_url()?>settings/"> <?php echo $this->lang->line('header_configuration');?> </a>
            <?php } ?>
            <?php if(in_array('54',$role_resources_ids)){?>
            <a class="dropdown-item" href="<?php echo site_url()?>settings/constants/"> <?php echo $this->lang->line('left_constants');?> </a>
            <?php } ?>
            <?php if(in_array('55',$role_resources_ids)){?>
            <a class="dropdown-item" href="<?php echo site_url()?>settings/email_template/"> <?php echo $this->lang->line('left_email_templates');?> </a>
            <?php } ?>
            <?php if(in_array('56',$role_resources_ids)){?>
            <a class="dropdown-item" href="<?php echo site_url()?>settings/database_backup/"> <?php echo $this->lang->line('header_db_log');?> </a>
            <?php } ?>
          </div>
        </li>
        <?php } ?>
        
        <li class="nav-item dropdown hidden-sm-down">
            <a href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="avatar box-32">
                    <?php  if($user_info[0]->profile_picture!='' && $user_info[0]->profile_picture!='no file') {?>
                    <img src="<?php  echo base_url().'uploads/profile/'.$user_info[0]->profile_picture;?>" alt="" id="user_avatar" 
                    class="b-a-radius-circle user_profile_avatar">
                    <?php } else {?>
                    <?php  if($user_info[0]->gender=='Male') { ?>
                    <?php 	$de_file = base_url().'uploads/profile/default_male.jpg';?>
                    <?php } else { ?>
                    <?php 	$de_file = base_url().'uploads/profile/default_female.jpg';?>
                    <?php } ?>
                    <img src="<?php  echo $de_file;?>" alt="" id="user_avatar" class=" b-a-radius-circle user_profile_avatar">
                    <?php  } ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right animated <?php echo $system[0]->animation_effect_topmenu;?>">
                <a class="dropdown-item" href="<?php echo site_url()?>profile/">
                    <i class="ti-user mr-0-5"></i> <?php echo $this->lang->line('header_my_profile');?>
                </a>
                <?php if(in_array('53',$role_resources_ids)){?>
                <a class="dropdown-item" href="<?php echo site_url()?>settings/">
                    <i class="ti-settings mr-0-5"></i> <?php echo $this->lang->line('left_settings');?>
                </a>
                <?php  } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target=".pro_change_password" data-profile_id="<?php echo $session['user_id'];?>"><i class="fa fa-key mr-0-5"></i> <?php echo $this->lang->line('header_change_password');?></a>
                <a class="dropdown-item" href="<?php echo site_url()?>logout/"><i class="ti-power-off mr-0-5"></i> <?php echo $this->lang->line('header_sign_out');?></a>
            </div>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="nav-item hidden-sm-down"> <a class="nav-link toggle-fullscreen" href="#"> <i class="ti-fullscreen"></i> </a> </li>
       
        <?php if($system[0]->enable_job_application_candidates=='yes'){?>
        <li class="nav-item hidden-sm-down"> <a href="<?php echo site_url();?>frontend/jobs/" target="_blank">
          
          </a> </li>
        <?php } ?>
        <?php if($user_info[0]->user_role_id!=1) {?>
        <?php if($system[0]->enable_attendance == 'yes' && $system[0]->enable_clock_in_btn=='yes'){?>
        <li class="nav-item hidden-sm-down clock-in-btn">
          <form name="set_clocking" id="set_clocking_hd" method="post">
            <input type="hidden" name="timeshseet" value="<?php echo $user_info[0]->user_id;?>">
            <?php $attendances = $this->Xin_model->attendance_time_checks($session['user_id']); $dat = $attendances->result();?>
            <?php if($attendances->num_rows() < 1) {?>
            <input type="hidden" value="clock_in" name="clock_state" id="clock_state">
            <input type="hidden" value="" name="time_id" id="time_id">
            <button class="btn btn-success text-uppercase w-min-sm mb-0-25 waves-effect waves-light" type="submit"><i class="fa fa-arrow-circle-right"></i> <?php echo $this->lang->line('dashboard_clock_in');?></button>
            <?php } else {?>
            <input type="hidden" value="clock_out" name="clock_state" id="clock_state">
            <input type="hidden" value="<?php echo $dat[0]->time_attendance_id;?>" name="time_id" id="time_id">
            <button class="btn btn-warning text-uppercase w-min-sm mb-0-25 waves-effect waves-light" type="submit"><i class="fa fa-arrow-circle-left"></i> <?php echo $this->lang->line('dashboard_clock_out');?></button>
            <?php } ?>
          </form>
        </li>
        <?php } ?>
        <?php } ?>
        
      </ul>
    </div>
  </nav>
</div>
<div class="modal fade pro_change_password animated <?php echo $system[0]->animation_effect_modal;?>" id="pro_change_password" tabindex="-1" role="dialog" aria-labelledby="pro_change_password" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="change_password_modal"></div>
  </div>
</div>
<div class="modal fade policy animated <?php echo $system[0]->animation_effect_modal;?>" id="policy" tabindex="-1" role="dialog" aria-labelledby="policy" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="policy_modal"></div>
  </div>
</div>