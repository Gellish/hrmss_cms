<?php
$session = $this->session->userdata('username');
$user_info = $this->Xin_model->read_user_info($session['user_id']);
$role_user = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);
if(!is_null($role_user)){
	$role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
	$role_resources_ids = explode(',',0);	
}
$designation_info = $this->Xin_model->read_designation_info($user_info[0]->designation_id);


?>
<!-- menu start-->

<div class="site-sidebar">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <?php
        	// user role menu
			//// if(in_array($_menu['md'],$role_resources_ids)) {
	  ?>
      <li class="menu-title"><?php echo $this->lang->line('dashboard_main');?></li>
      <li> <a href="<?php echo site_url('dashboard');?>" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-home"></i></span> <span class="s-text"><?php echo $this->lang->line('dashboard_title');?></span> </a> </li>
      <?php  if(in_array('1',$role_resources_ids) || in_array('3',$role_resources_ids) || in_array('4',$role_resources_ids) || in_array('5',$role_resources_ids) || in_array('6',$role_resources_ids) || in_array('7',$role_resources_ids) || in_array('8',$role_resources_ids) || in_array('9',$role_resources_ids) || in_array('10',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-building-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_organization');?></span> </a>
        <ul>
          <?php  if(in_array('3',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url('company')?>"><?php echo $this->lang->line('left_company');?></a></li>
          <?php } ?>
          <?php  if(in_array('4',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>location"><?php echo $this->lang->line('left_location');?></a></li>
          <?php } ?>
          <?php  if(in_array('5',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>department"><?php echo $this->lang->line('left_department');?></a></li>
          <?php } ?>
          <?php  if(in_array('6',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>designation"><?php echo $this->lang->line('left_designation');?></a></li>
          <?php } ?>
          <?php  if(in_array('8',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>announcement"><?php echo $this->lang->line('left_announcements');?></a></li>
          <?php } ?>
          <?php if(in_array('9',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>policy"><?php echo $this->lang->line('left_policies');?></a></li>
          <?php } ?>
          <?php  if(in_array('10',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>expense"><?php echo $this->lang->line('left_expense');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  if(in_array('11',$role_resources_ids) || in_array('13',$role_resources_ids) || in_array('14',$role_resources_ids) || in_array('15',$role_resources_ids) || in_array('16',$role_resources_ids) || in_array('17',$role_resources_ids) || in_array('18',$role_resources_ids) || in_array('19',$role_resources_ids) || in_array('20',$role_resources_ids) || in_array('21',$role_resources_ids) || in_array('22',$role_resources_ids) || in_array('23',$role_resources_ids) || in_array('24',$role_resources_ids) || in_array('25',$role_resources_ids) || in_array('26',$role_resources_ids) || in_array('27',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="ti-user"></i></span> <span class="s-text"><?php echo $this->lang->line('dashboard_employees');?></span> </a>
        <ul>
          <?php  if(in_array('13',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url('employees');?>"><?php echo $this->lang->line('dashboard_employees');?></a></li>
          <?php } ?>
          <?php  if(in_array('14',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>roles"><?php echo $this->lang->line('left_set_roles');?></a></li>
          <?php } ?>
          <?php  if(in_array('15',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>awards"><?php echo $this->lang->line('left_awards');?></a></li>
          <?php } ?>
          <?php  if(in_array('16',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>transfers"><?php echo $this->lang->line('left_transfers');?></a></li>
          <?php } ?>
          <?php  if(in_array('17',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>resignation"><?php echo $this->lang->line('left_resignations');?></a></li>
          <?php } ?>
          <?php  if(in_array('18',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>travel"><?php echo $this->lang->line('left_travels');?></a></li>
          <?php } ?>
          <?php  if(in_array('20',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>promotion"><?php echo $this->lang->line('left_promotions');?></a></li>
          <?php } ?>
          <?php if(in_array('21',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>complaints"><?php echo $this->lang->line('left_complaints');?></a></li>
          <?php } ?>
          <?php if(in_array('22',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>warning"><?php echo $this->lang->line('left_warnings');?></a></li>
          <?php } ?>
          <?php if(in_array('23',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>termination"><?php echo $this->lang->line('left_terminations');?></a></li>
          <?php } ?>
          <?php  if(in_array('26',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>employees_last_login"><?php echo $this->lang->line('left_employees_last_login');?></a></li>
          <?php } ?>
          <?php if(in_array('27',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>employee_exit"><?php echo $this->lang->line('left_employees_exit');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if(in_array('240',$role_resources_ids) || in_array('24',$role_resources_ids) || in_array('25',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-dribbble"></i></span> <span class="s-text"><?php echo $this->lang->line('left_performance');?></span> </a>
        <ul>
          <?php if(in_array('24',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>performance_indicator"><?php echo $this->lang->line('left_performance_indicator');?></a></li>
          <?php } ?>
          <?php if(in_array('25',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>performance_appraisal"><?php echo $this->lang->line('left_performance_appraisal');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  if(in_array('28',$role_resources_ids) || in_array('29',$role_resources_ids) || in_array('30',$role_resources_ids) || in_array('31',$role_resources_ids) || in_array('32',$role_resources_ids) || in_array('33',$role_resources_ids) || in_array('34',$role_resources_ids) || in_array('35',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-clock-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_timesheet');?></span> </a>
        <ul>
          <?php  if(in_array('29',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>timesheet/attendance/"><?php echo $this->lang->line('left_attendance');?></a></li>
          <?php } ?>
          <?php if(in_array('30',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>timesheet/date_wise_attendance/"><?php echo $this->lang->line('left_date_wise_attendance');?></a></li>
          <?php } ?>
          <?php  if(in_array('31',$role_resources_ids)) { ?>
          <li><a href="<?php echo base_url();?>timesheet/update_attendance/"><?php echo $this->lang->line('left_update_attendance');?></a></li>
          <?php } ?>
          <?php  if(in_array('58',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>timesheet/import/"><?php echo $this->lang->line('left_import_attendance');?></a></li>
          <?php } ?>
          <?php if(in_array('32',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>timesheet/leave/"><?php echo $this->lang->line('left_leaves');?></a></li>
          <?php } ?>
          <?php if(in_array('34',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>timesheet/office_shift/"><?php echo $this->lang->line('left_office_shifts');?></a></li>
          <?php } ?>
          <?php if(in_array('35',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>timesheet/holidays/"><?php echo $this->lang->line('left_holidays');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if(in_array('36',$role_resources_ids) || in_array('38',$role_resources_ids) || in_array('39',$role_resources_ids) || in_array('40',$role_resources_ids) || in_array('41',$role_resources_ids) || in_array('42',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-calculator"></i></span> <span class="s-text"><?php echo $this->lang->line('left_payroll');?></span> </a>
        <ul>
          <?php if(in_array('38',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>payroll/templates/"><?php echo $this->lang->line('left_payroll_templates');?></a></li>
          <?php } ?>
          <?php if(in_array('39',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>payroll/hourly_wages/"><?php echo $this->lang->line('left_hourly_wages');?></a></li>
          <?php } ?>
          <?php if(in_array('40',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>payroll/manage_salary/"><?php echo $this->lang->line('left_manage_salary');?></a></li>
          <?php } ?>
          <?php if(in_array('59',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url('payroll/advance_salary');?>"><?php echo $this->lang->line('xin_advance_salary');?></a></li>
          <?php } ?>
          <?php if(in_array('60',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url('payroll/advance_salary_report');?>"><?php echo $this->lang->line('xin_advance_salary_report');?></a></li>
          <?php } ?>
          <?php if(in_array('41',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>payroll/generate_payslip/"><?php echo $this->lang->line('left_generate_payslip');?></a></li>
          <?php } ?>
          <?php if(in_array('42',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>payroll/payment_history/"><?php echo $this->lang->line('left_payment_history');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?> 
      <?php  if(in_array('7',$role_resources_ids)) { ?>
      <li> <a href="<?php echo site_url('project');?>" class="waves-effect waves-light"> <span class="s-icon"><i class="ti-layers-alt"></i></span> <span class="s-text"><?php echo $this->lang->line('left_projects');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('33',$role_resources_ids)) { ?>
      <li> <a href="<?php echo site_url('timesheet/tasks');?>" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-tasks"></i></span> <span class="s-text"><?php echo $this->lang->line('left_tasks');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('19',$role_resources_ids)) { ?>
      <li> <a href="<?php echo site_url('tickets');?>" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-ticket"></i></span> <span class="s-text"><?php echo $this->lang->line('left_tickets');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('43',$role_resources_ids) || in_array('45',$role_resources_ids) || in_array('46',$role_resources_ids) || in_array('47',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-newspaper-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_recruitment');?></span> </a>
        <ul>
          <?php  if(in_array('45',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>job_post"><?php echo $this->lang->line('left_job_posts');?></a></li>
          <?php } ?>
          <?php if(in_array('44',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>frontend/jobs/" target="_blank"><?php echo $this->lang->line('left_jobs_listing');?> <small><?php echo $this->lang->line('left_frontend');?></small></a></li>
          <?php } ?>
          <?php if(in_array('46',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>job_candidates"><?php echo $this->lang->line('left_job_candidates');?></a></li>
          <?php } ?>
          <?php if(in_array('47',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url();?>job_interviews"><?php echo $this->lang->line('left_job_interviews');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if(in_array('48',$role_resources_ids) || in_array('49',$role_resources_ids) || in_array('50',$role_resources_ids) || in_array('51',$role_resources_ids)){?>
      <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-mortar-board"></i></span> <span class="s-text"><?php echo $this->lang->line('left_training');?></span> </a>
        <ul>
          <?php if(in_array('49',$role_resources_ids)){?>
          <li><a href="<?php echo site_url();?>training"><?php echo $this->lang->line('left_training_list');?></a></li>
          <?php } ?>
          <?php if(in_array('50',$role_resources_ids)){?>
          <li><a href="<?php echo site_url();?>training_type"><?php echo $this->lang->line('left_training_type');?></a></li>
          <?php } ?>
          <?php if(in_array('51',$role_resources_ids)){?>
          <li><a href="<?php echo site_url();?>trainers"><?php echo $this->lang->line('left_trainers_list');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  if(in_array('57',$role_resources_ids)) { ?>
      <li> <a href="<?php echo site_url('files');?>" class="waves-effect waves-light"> <span class="s-icon"><i class=" fa fa-file"></i></span> <span class="s-text"><?php echo $this->lang->line('xin_files_manager');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('52',$role_resources_ids)){?>
      <li> <a href="<?php echo site_url('employees/directory');?>" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-database"></i></span> <span class="s-text"><?php echo $this->lang->line('left_employees_directory');?></span> </a> </li>
      <?php } ?>
      <?php if($role_user[0]->role_id==1) {?>
      <?php if(in_array('71',$role_resources_ids) || in_array('72',$role_resources_ids) || in_array('73',$role_resources_ids)){?>
      <li class="menu-title"><?php echo $this->lang->line('xin_acc_accounting');?></li>
        <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-university"></i></span> <span class="s-text"><?php echo $this->lang->line('xin_acc_accounts');?></span> </a>
        <ul>
            <?php if(in_array('72',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/bank_cash');?>"><?php echo $this->lang->line('xin_acc_account_list');?></a></li>
            <?php } ?>
            <?php if(in_array('73',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/account_balances');?>"><?php echo $this->lang->line('xin_acc_account_balances');?></a></li>
            <?php } ?>
        </ul>
        </li>
        <?php } ?>
        <?php if(in_array('74',$role_resources_ids) || in_array('75',$role_resources_ids) || in_array('76',$role_resources_ids) || in_array('77',$role_resources_ids) || in_array('78',$role_resources_ids)){?>
        <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-money"></i></span> <span class="s-text"><?php echo $this->lang->line('xin_acc_transactions');?></span> </a>
        <ul>
            <?php if(in_array('75',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/deposit');?>"><?php echo $this->lang->line('xin_acc_deposit');?></a></li>
            <?php } ?>
            <?php if(in_array('76',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/expense');?>"><?php echo $this->lang->line('xin_acc_expense');?></a></li>
            <?php } ?>
            <?php if(in_array('77',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/transfer');?>"><?php echo $this->lang->line('xin_acc_transfer');?></a></li>
            <?php } ?>
            <?php if(in_array('78',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/transactions');?>"><?php echo $this->lang->line('xin_acc_view_transactions');?></a></li>
            <?php } ?>
        </ul>
        </li>
         <?php } ?>
         <?php if(in_array('79',$role_resources_ids) || in_array('80',$role_resources_ids) || in_array('81',$role_resources_ids)){?>
        <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-exchange"></i></span> <span class="s-text"><?php echo $this->lang->line('xin_acc_payees_payers');?></span> </a>
        <ul>
            <?php if(in_array('80',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/payees');?>"><?php echo $this->lang->line('xin_acc_payees');?></a></li>
            <?php } ?>
            <?php if(in_array('81',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/payers');?>"><?php echo $this->lang->line('xin_acc_payers');?></a></li>
            <?php } ?>
        </ul>
        </li>
        </li>
        <?php } ?>
        <?php if(in_array('82',$role_resources_ids) || in_array('83',$role_resources_ids) || in_array('84',$role_resources_ids) || in_array('85',$role_resources_ids) || in_array('86',$role_resources_ids)){?>
        <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-bar-chart-o"></i></span> <span class="s-text"><?php echo $this->lang->line('xin_acc_reports');?></span> </a>
        <ul>
            <?php if(in_array('83',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/account_statement');?>"><?php echo $this->lang->line('xin_acc_account_statement');?></a></li>
            <?php } ?> 
            <?php if(in_array('84',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/expense_report');?>"><?php echo $this->lang->line('xin_acc_expense_reports');?></a></li>
            <?php } ?> 
            <?php if(in_array('85',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/income_report');?>"><?php echo $this->lang->line('xin_acc_income_reports');?></a></li>
            <?php } ?> 
            <?php if(in_array('86',$role_resources_ids)){?>
            <li><a href="<?php echo site_url('accounting/transfer_report');?>"><?php echo $this->lang->line('xin_acc_transfer_report');?></a></li>
            <?php } ?> 
        </ul>
        </li>   
        <?php } ?>     
      <?php } ?> 
      <?php if($role_user[0]->role_id==1) {?>
      <li class="menu-title"><?php echo $this->lang->line('left_more');?></li>
      <?php } ?>
      <?php if(in_array('53',$role_resources_ids)){?>
      <li> <a href="<?php echo site_url();?>settings/" class="waves-effect waves-light"> <span class="s-icon"><i class="ti-settings"></i></span> <span class="s-text"><?php echo $this->lang->line('left_settings');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('54',$role_resources_ids)){?>
      <li> <a href="<?php echo site_url();?>settings/constants" class="waves-effect waves-light"> <span class="s-icon"><i class="ti-menu"></i></span> <span class="s-text"><?php echo $this->lang->line('left_constants');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('56',$role_resources_ids)){?>
      <li> <a href="<?php echo site_url();?>settings/database_backup/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-database"></i></span> <span class="s-text"><?php echo $this->lang->line('left_db_backup');?></span> </a> </li>
      <?php } ?>
      <?php if(in_array('55',$role_resources_ids)){?>
      <li> <a href="<?php echo site_url();?>settings/email_template/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-envelope-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_email_templates');?></span> </a> </li>
      <?php } ?>
      <?php if($role_user[0]->role_id!=1) {?>
      <li> <a href="<?php echo site_url();?>employee/attendance/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-clock-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_attendance');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/leave/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-bed"></i></span> <span class="s-text"><?php echo $this->lang->line('left_leave');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/awards/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-trophy"></i></span> <span class="s-text"><?php echo $this->lang->line('left_awards');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/tickets/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-ticket"></i></span> <span class="s-text"><?php echo $this->lang->line('left_tickets');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/tasks/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-list"></i></span> <span class="s-text"><?php echo $this->lang->line('left_tasks');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/projects/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-archive"></i></span> <span class="s-text"><?php echo $this->lang->line('left_projects');?></span> </a> </li>
     <li class="with-sub"> <a href="javascript:void(0);" class="waves-effect  waves-light"> <span class="s-caret"><i class="fa fa-angle-down"></i></span> <span class="s-icon"><i class="fa fa-calculator"></i></span> <span class="s-text"><?php echo $this->lang->line('left_payroll');?></span> </a>
        <ul>
         <li> <a href="<?php echo site_url('employee/payslip/');?>" class="waves-effect waves-light"><?php echo $this->lang->line('left_payslips');?></a> </li>
          <li><a href="<?php echo site_url('employee/payroll/advance_salary');?>"><?php echo $this->lang->line('xin_advance_salary');?></a></li>
          <li><a href="<?php echo site_url('employee/payroll/advance_salary_report');?>"><?php echo $this->lang->line('xin_advance_salary_report');?></a></li>
        </ul>
      </li>
       
      <li> <a href="<?php echo site_url();?>employee/training/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-mortar-board"></i></span> <span class="s-text"><?php echo $this->lang->line('left_training');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/announcement/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-sticky-note"></i></span> <span class="s-text"><?php echo $this->lang->line('left_announcements');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/performance/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-edit"></i></span> <span class="s-text"><?php echo $this->lang->line('left_performance');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/transfer/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-refresh"></i></span> <span class="s-text"><?php echo $this->lang->line('left_transfers');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/promotion/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-star-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_promotions');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/complaints/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-exclamation-circle"></i></span> <span class="s-text"><?php echo $this->lang->line('left_complaints');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/warning/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-exclamation-triangle"></i></span> <span class="s-text"><?php echo $this->lang->line('left_warnings');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/travels/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-plane"></i></span> <span class="s-text"><?php echo $this->lang->line('left_travels');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/office_shift/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-history"></i></span> <span class="s-text"><?php echo $this->lang->line('left_office_shift');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/job_applied/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-newspaper-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_jobs_applied');?></span> </a> </li>
      <li> <a href="<?php echo site_url();?>employee/job_interviews/" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-comments-o"></i></span> <span class="s-text"><?php echo $this->lang->line('left_job_interview');?></span> </a> </li>
      <?php } ?>
      <li> <a href="<?php echo site_url();?>logout" class="waves-effect waves-light"> <span class="s-icon"><i class="fa fa-sign-out"></i></span> <span class="s-text"><?php echo $this->lang->line('left_logout');?></span> </a> </li>
      <?php ?>
    </ul>
  </div>
</div>
<!-- menu end--> 
