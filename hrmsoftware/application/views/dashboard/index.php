<?php
$session = $this->session->userdata('username');
$system = $this->Xin_model->read_setting_info(1);
$user_info = $this->Xin_model->read_user_info($session['user_id']);
$role = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);
if(!is_null($role)){
	$role_name = $role[0]->role_name;
} else {
	$role_name = '--';	
}
// get designation
$department = $this->Department_model->read_department_information($user_info[0]->department_id);
if(!is_null($department)){
	$department_id = $department[0]->department_id;
} else {
	$department_id = '--';	
}
?>
<?php if($user_info[0]->user_role_id=='1'){?>

<div class="row row-md mb-1">
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-danger mb-2">
      <div class="t-icon right"><i class="fa fa-user"></i></div>
      <div class="t-content">
        <h1 class="mb-1"><?php echo $this->Employees_model->get_total_employees();?></h1>
        <h6 class="text-uppercase"><?php echo $this->lang->line('dashboard_total_employees');?></h6>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-success mb-2">
      <div class="t-icon right"><i class="ti-bar-chart"></i></div>
      <div class="t-content">
        <h1 class="mb-1">
          <?php $exp_am = $this->Expense_model->get_total_expenses();?>
          <?php echo $this->Xin_model->currency_sign($exp_am[0]->exp_amount);?></h1>
        <h6 class="text-uppercase"><?php echo $this->lang->line('dashboard_total_expenses');?></h6>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-primary mb-2">
      <div class="t-icon right"><i class="ti-package"></i></div>
      <div class="t-content">
        <h1 class="mb-1">
          <?php $all_sal = $this->Xin_model->get_total_salaries_paid();?>
          <?php echo $this->Xin_model->currency_sign($all_sal[0]->paid_amount);?></h1>
        <h6 class="text-uppercase"><?php echo $this->lang->line('dashboard_total_salaries');?></h6>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-warning mb-2">
      <div class="t-icon right"><i class="ti-receipt"></i></div>
      <div class="t-content">
        <h1 class="mb-1"><?php echo $this->Xin_model->get_all_jobs();?></h1>
        <h6 class="text-uppercase"><?php echo $this->lang->line('dashboard_total_jobs');?></h6>
      </div>
    </div>
  </div>
</div>
<div class="row row-md mb-1">
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block bg-white tile tile-3 sdl-tile mb-2">
      <div class="t-icon right"><i class="fa fa-th-large"></i></div>
      <div class="t-content"> <span class="text-uppercase text-danger"><?php echo $this->lang->line('dashboard_departments');?></span>
        <h1 class="mb-0"><?php echo $this->Xin_model->get_all_departments();?></h1>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block bg-white tile tile-3 payroll-tile mb-2">
      <div class="t-icon right"><i class="fa fa-folder-open-o"></i></div>
      <div class="t-content"> <span class="text-uppercase text-success"><?php echo $this->lang->line('dashboard_projects');?></span>
        <h1 class="mb-0"><?php echo $this->Xin_model->get_all_projects();?></h1>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block bg-white tile tile-3 payroll-tile mb-2">
      <div class="t-icon right"><i class="fa fa-building-o"></i></div>
      <div class="t-content"> <span class="text-uppercase text-primary"><?php echo $this->lang->line('dashboard_locations');?></span>
        <h1 class="mb-0"><?php echo $this->Xin_model->get_all_locations();?></h1>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block bg-white tile tile-3 payroll-tile mb-2">
      <div class="t-icon right"><i class="fa fa-clone"></i></div>
      <div class="t-content"> <span class="text-uppercase text-primary"><?php echo $this->lang->line('dashboard_companies');?></span>
        <h1 class="mb-0"><?php echo $this->Xin_model->get_all_companies();?></h1>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="row row-md mb-1">
  <?php if($user_info[0]->user_role_id!='1'){?>
  <div class="col-md-3">
    <div class="box bg-white user-1">
      <div class="u-img img-cover" style="background-image: url(<?php echo base_url();?>uploads/profile/background/<?php echo $user_info[0]->profile_background;?>);"></div>
      <div class="u-content">
        <div class="avatar box-64">
          <?php 
			if($user_info[0]->profile_picture!='' && $user_info[0]->profile_picture!='no file') {
				$lde_file = base_url().'uploads/profile/'.$user_info[0]->profile_picture;
			} else { 
				if($user_info[0]->gender=='Male') {  
					$lde_file = base_url().'uploads/profile/default_male.jpg'; 
				} else {  
					$lde_file = base_url().'uploads/profile/default_female.jpg';
				}
			}
			$last_login =  new DateTime($user_info[0]->last_login_date);
			?>
          <img class="b-a-radius-circle shadow-white" src="<?php echo $lde_file;?>" alt=""> <i class="status bg-success bottom right"></i> </div>
        <h5><a class="text-black" href="<?php site_url();?>employees/detail/<?php echo $user_info[0]->user_id;?>/"> <?php echo $user_info[0]->first_name. ' ' .$user_info[0]->last_name;?></a></h5>
        <p class="text-muted pb-0-5"><?php echo $role_name;?></p>
        <p class="text-muted pb-0-5"><?php echo $this->lang->line('dashboard_last_login');?>: <?php echo $this->Xin_model->set_date_format($user_info[0]->last_login_date).' '.$last_login->format('h:i a');?></p>
        <?php if($system[0]->enable_attendance == 'yes'){?>
        <div class="text-xs-center pb-0-5">
          <form name="set_clocking" id="set_clocking" method="post">
            <input type="hidden" name="timeshseet" value="<?php echo $user_info[0]->user_id;?>">
            <?php $attendances = $this->Timesheet_model->attendance_time_checks($user_info[0]->user_id); $dat = $attendances->result();?>
            <?php if($attendances->num_rows() < 1) {?>
            <input type="hidden" value="clock_in" name="clock_state" id="clock_state">
            <input type="hidden" value="" name="time_id" id="time_id">
            <button class="form-control b-a btn btn-success text-uppercase" type="submit" id="clock_btn"><i class="fa fa-arrow-circle-right"></i> <?php echo $this->lang->line('dashboard_clock_in');?></button>
            <?php } else {?>
            <input type="hidden" value="clock_out" name="clock_state" id="clock_state">
            <input type="hidden" value="<?php echo $dat[0]->time_attendance_id;?>" name="time_id" id="time_id">
            <button class="form-control b-a btn btn-warning text-uppercase" type="submit" id="clock_btn"><i class="fa fa-arrow-circle-left"></i> <?php echo $this->lang->line('dashboard_clock_out');?></button>
            <?php } ?>
          </form>
        </div>
        <?php } ?>
      </div>
      <?php
		$att_date =  date('d-M-Y');
		$attendance_date = date('d-M-Y');
		// get office shift for employee
		$get_day = strtotime($att_date);
		$day = date('l', $get_day);
		$strtotime = strtotime($attendance_date);
		$new_date = date('d-M-Y', $strtotime);
		// office shift
		$u_shift = $this->Timesheet_model->read_office_shift_information($user_info[0]->office_shift_id);
		
		// get clock in/clock out of each employee
		if($day == 'Monday') {
			if($u_shift[0]->monday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_monday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->monday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->monday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		} else if($day == 'Tuesday') {
			if($u_shift[0]->tuesday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_tuesday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->tuesday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->tuesday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		} else if($day == 'Wednesday') {
			if($u_shift[0]->wednesday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_wednesday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->wednesday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->wednesday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		} else if($day == 'Thursday') {
			if($u_shift[0]->thursday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_thursday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->thursday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->thursday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		} else if($day == 'Friday') {
			if($u_shift[0]->friday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_friday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->friday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->friday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		} else if($day == 'Saturday') {
			if($u_shift[0]->saturday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_saturday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->saturday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->saturday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		} else if($day == 'Sunday') {
			if($u_shift[0]->sunday_in_time==''){
				$office_shift = $this->lang->line('dashboard_today_sunday_shift');
			} else {
				$in_time =  new DateTime($u_shift[0]->sunday_in_time. ' ' .$attendance_date);
				$out_time =  new DateTime($u_shift[0]->sunday_out_time. ' ' .$attendance_date);
				$clock_in = $in_time->format('h:i a');
				$clock_out = $out_time->format('h:i a');
				$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
			}
		}
	  ?>
      <div class="u-counters">
        <div class="row no-gutter">
          <div class="col-xs-12 uc-item"> <a class="text-black" href="javascript:void(0);"> <?php echo $office_shift;?></a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-block bg-white">
      <h2><?php echo $this->lang->line('dashboard_personal_details');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table width="" class="table table-striped m-md-b-0">
          <tbody>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_fullname');?></th>
              <td><?php echo $first_name.' '.$last_name;?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_employee_id');?></th>
              <td><?php echo $employee_id;?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_username');?></th>
              <td><?php echo $username;?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_email');?></th>
              <td><?php echo $email;?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_designation');?></th>
              <td><?php $designation_name;?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_dob');?></th>
              <td><?php echo $this->Xin_model->set_date_format($date_of_birth);?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo $this->lang->line('dashboard_contact');?>#</th>
              <td><?php echo $contact_no;?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-block bg-white" style="overflow-y: overlay; height: 414px;">
      <h2><strong><?php echo $this->lang->line('dashboard_my_projects');?></strong></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-hover table-grey-head mb-md-0">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
              <th><?php echo $this->lang->line('dashboard_project_date');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
            </tr>
          </thead>
          <tbody>
            <?php $project = $this->Project_model->get_projects();?>
            <?php $dId = array(); $i=1; foreach($project->result() as $pj):
					 // $aw_name = $hrm->e_award_type($emp_award->award_type_id);
					 $asd = array($pj->assigned_to);
					 $aim = explode(',',$pj->assigned_to);
					 foreach($aim as $dIds) {
						 if($session['user_id'] === $dIds) {
							$dId[] = $session['user_id'];
					// project date		
					$pdate = $this->Xin_model->set_date_format($pj->end_date);
					// project progress
					if($pj->project_progress <= 20) {
						$progress_class = 'progress-danger';
					} else if($pj->project_progress > 20 && $pj->project_progress <= 50){
						$progress_class = 'progress-warning';
					} else if($pj->project_progress > 50 && $pj->project_progress <= 75){
						$progress_class = 'progress-info';
					} else {
						$progress_class = 'progress-success';
					}
					 
					// project progress
					if($pj->status == 0) {
						$status = $this->lang->line('xin_not_started');
					} else if($pj->status ==1){
						$status = $this->lang->line('xin_in_progress');
					} else if($pj->status ==2){
						$status = $this->lang->line('xin_completed');
					} else {
						$status = $this->lang->line('xin_deffered');
					}
					 ?>
            <tr>
              <td><?php echo $pj->title;?></td>
              <td><?php echo $pdate;?></td>
              <td><?php echo $status;?></td>
              <td><p class="m-b-0-5"><?php echo $this->lang->line('dashboard_completed');?> <span class="pull-xs-right"><?php echo $pj->project_progress;?>%</span></p>
                <progress class="progress <?php echo $progress_class;?> progress-sm d-inline-block mb-0" value="<?php echo $pj->project_progress;?>" max="100"><?php echo $pj->project_progress;?>%</progress></td>
            </tr>
            <?php }
					} ?>
            <?php $i++; endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($user_info[0]->user_role_id=='1'){?>
  <div class="col-md-6">
    <div class="card box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('dashboard_new');?></strong> <?php echo $this->lang->line('dashboard_employees');?></h2>
      <?php foreach($last_four_employees as $employee) {?>
      <?php 
		if($employee->profile_picture!='' && $employee->profile_picture!='no file') {
			$de_file = 'uploads/profile/'.$employee->profile_picture;
		} else { 
			if($employee->gender=='Male') {  
			$de_file = 'uploads/profile/default_male.jpg'; 
			} else {  
			$de_file = 'uploads/profile/default_female.jpg';
			}
		}
		$fname = $employee->first_name.' '.$employee->last_name;
		// get designation
		$designation = $this->Designation_model->read_designation_information($employee->designation_id);
		if(!is_null($designation)){
			$designation_name = $designation[0]->designation_name;
		  } else {
			$designation_name = '--';	
		  }
		?>
      <div class="items-list">
        <div class="il-item" style="padding:0.63rem 1.25rem;"> <a class="text-black" href="<?php echo site_url();?>employees/detail/<?php echo $employee->user_id;?>/">
          <div class="media">
            <div class="media-left">
              <div class="avatar box-48"> <img class="b-a-radius-0-125" src="<?php echo base_url().$de_file;?>" alt=""> </div>
            </div>
            <div class="media-body">
              <h6 class="media-heading"><?php echo $fname;?></h6>
              <span class="text-muted"><?php echo $designation_name;?></span> </div>
          </div>
          <div class="il-icon"><i class="fa fa-angle-right"></i></div>
          </a> </div>
      </div>
      <?php } ?>
      <div class="card-block"> <a class="btn btn-primary btn-block" href="<?php site_url();?>employees"><?php echo $this->lang->line('dashboard_show_more');?></a> </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('dashboard_recruitment');?></strong> <?php echo $this->lang->line('dashboard_timeline');?></h2>
      <div class="">
        <div class="notifications">
          <?php foreach($last_jobs as $job_apps):?>
          <?php $candidate = $this->Xin_model->read_user_info($job_apps->user_id);?>
          <?php
			if(!is_null($candidate)){
				$candidate_name = $candidate[0]->first_name.' '.$candidate[0]->last_name;
				// get image
				if($candidate[0]->profile_picture!='' && $candidate[0]->profile_picture!='no file') {
					$de_file = '<img class="b-a-radius-circle" src="'.base_url().'uploads/profile/'.$candidate[0]->profile_picture.'" alt="">';
				} else {
					if($candidate[0]->gender=='Male') {
						$de_filesr = base_url().'uploads/profile/default_male.jpg';
					} else {
						$de_filesr = base_url().'uploads/profile/default_female.jpg';
					}
					$de_file = '<img class="b-a-radius-circle" src="'.$de_filesr.'" alt="">';
				}
			} else {
				$candidate_name = '--';
				$de_file = '--';	
			}
		  ?>
          <?php $job = $this->Job_post_model->read_job_information($job_apps->job_id);?>
          <?php
		  	if(!is_null($candidate)){
				$job_title = $job[0]->job_title;
			} else {
				$job_title = '--';
			}
		  ?>
          <?php $created_at = date("F j, Y", strtotime($job_apps->created_at));?>
          <?php $app_time = new DateTime($job_apps->created_at);?>
          <div class="n-item" style="margin-bottom: 0;">
            <div class="media">
              <div class="media-left">
                <div class="avatar box-48">
                  <?php echo $de_file;?>
                </div>
              </div>
              <div class="media-body">
                <div class="n-text"><strong><?php echo $candidate_name;?></strong> <span class="text-muted"><?php echo $this->lang->line('dashboard_applied_for');?> </span> <strong><?php echo $job_title;?></strong> <?php echo $this->lang->line('dashboard_position');?></div>
                <div class="text-muted font-90"><?php echo $created_at.', '.$app_time->format('h:i a');?></div>
              </div>
            </div>
          </div>
          <hr>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($user_info[0]->user_role_id!='1'){?>
</div><?php } ?>
<?php if($user_info[0]->user_role_id=='1'){?>
<div class="row m-b-1">
  <div class="col-md-12">
    <div class="box box-block bg-white">
    <input readonly id="attendance_date" name="attendance_date" type="hidden" value="<?php echo date('Y-m-d');?>">
      <h2><strong><?php echo $this->lang->line('dashboard_today_attendance');?> - <span id="att_date"> <?php echo $edate = $this->Xin_model->set_date_format(date('d M, Y'));?></strong></span> </h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
              <th><?php echo $this->lang->line('dashboard_clock_in');?></th>
              <th><?php echo $this->lang->line('dashboard_clock_out');?></th>
              <th><?php echo $this->lang->line('dashboard_late');?></th>
              <th><?php echo $this->lang->line('dashboard_early_leaving');?></th>
              <th><?php echo $this->lang->line('dashboard_overtime');?></th>
              <th><?php echo $this->lang->line('dashboard_total_work');?></th>
              <th><?php echo $this->lang->line('dashboard_total_rest');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row row-md mb-1 animated fadeInRight">
  <div class="col-md-6 mb-1 mb-md-0">
    <div class="box box-block bg-white">
      <h2><?php echo $this->lang->line('dashboard_company_wise_salary');?></h2>
      <canvas id="doughnut" class="chart-container"></canvas>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-block bg-white">
      <h2><?php echo $this->lang->line('dashboard_station_wise_salary');?></h2>
      <canvas id="polar-area" class="chart-container"></canvas>
    </div>
  </div>
</div>
<div class="row row-md mb-1 animated fadeInRight">
  <div class="col-md-6 mb-1 mb-md-0">
    <div class="box box-block bg-white">
      <h2><?php echo $this->lang->line('dashboard_dept_wise_salary');?></h2>
      <canvas id="pie" class="chart-container"></canvas>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-block bg-white">
      <h2><?php echo $this->lang->line('dashboard_desig_wise_salary');?></h2>
      <canvas id="bar" class="chart-container"></canvas>
    </div>
  </div>
</div>
<?php } ?>
<?php if($user_info[0]->user_role_id!='1'){?>
<div class="row row-md mb-1">
  <div class="col-md-6">
    <div class="box box-block bg-white" style="overflow-y: overlay; height: 351px;">
      <h2><strong><?php echo $this->lang->line('dashboard_my_tasks');?></strong></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-hover table-grey-head mb-md-0">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_end_date');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
            </tr>
          </thead>
          <tbody>
            <?php $task = $this->Timesheet_model->get_tasks();?>
            <?php $dId = array(); $i=1; foreach($task->result() as $et):
                 // $aw_name = $hrm->e_award_type($emp_award->award_type_id);
                 $asd = array($et->assigned_to);
                 $aim = explode(',',$et->assigned_to);
                 foreach($aim as $dIds) {
                     if($session['user_id'] === $dIds) {
                        $dId[] = $session['user_id'];
                // task end date		
                $tdate = $this->Xin_model->set_date_format($et->end_date);
                // task progress
                if($et->task_progress <= 20) {
                    $progress_class = 'progress-danger';
                } else if($et->task_progress > 20 && $et->task_progress <= 50){
                    $progress_class = 'progress-warning';
                } else if($et->task_progress > 50 && $et->task_progress <= 75){
                    $progress_class = 'progress-info';
                } else {
                    $progress_class = 'progress-success';
                }
                 
                // project progress
                if($et->task_status == 0) {
                    $status = $this->lang->line('xin_not_started');
                } else if($et->task_status ==1){
                    $status = $this->lang->line('xin_in_progress');
                } else if($et->task_status ==2){
                    $status = $this->lang->line('xin_completed');
                } else {
                    $status = $this->lang->line('xin_deffered');
                }
                 ?>
            <tr>
              <td><?php echo $et->task_name;?></td>
              <td><?php echo $tdate;?></td>
              <td><?php echo $status;?></td>
              <td><p class="m-b-0-5"><?php echo $this->lang->line('dashboard_completed');?> <span class="pull-xs-right">
			  <?php echo $et->task_progress;?>%</span></p>
                <progress class="progress <?php echo $progress_class;?> progress-sm d-inline-block mb-0" value="<?php echo $et->task_progress;?>" max="100"><?php echo $et->task_progress;?>%</progress></td>
            </tr>
            <?php }
                } ?>
            <?php $i++; endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-block bg-white tile tile-3 mb-2">
      <div class="t-content">
        <h6 class="text-uppercase text-danger"><?php echo date('F');?> <?php echo $this->lang->line('dashboard_attendance');?></h6>
        <?php
                    $m =  date('m');
                    $y =  date('Y');
                    $numDays = cal_days_in_month (CAL_GREGORIAN, $m,$y);
                    ?>
        <h1 class="mb-0"><?php echo count($this->Xin_model->current_month_attendance());?>/<?php echo $numDays;?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="box box-block bg-white tile tile-3 mb-2">
      <div class="t-content">
        <h6 class="text-uppercase text-danger"><?php echo $this->lang->line('dashboard_total_awards');?></h6>
        <h1 class="mb-0"><?php echo count($this->Xin_model->total_employee_awards());?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card box box-block bg-white" style="overflow-y: overlay; height: 242px;">
      <h2><strong><?php echo $this->lang->line('dashboard_announcements');?></strong></h2>
      <div class="">
        <div>
          <?php
              $announcement = $this->Announcement_model->get_announcements();
              $dId = array(); $i=1; foreach($announcement->result() as $an):
                 if($an->department_id == $department_id) {
                    $andate = $this->Xin_model->set_date_format($an->created_at);
             ?>
          <div class="n-item" style="margin-bottom: 0;">
            <div class="media">
              <div class="media-body">
                <div class="n-text"><strong><?php echo $an->title;?></strong> <span class="text-muted" style="float:right;"><?php echo $andate;?> </span></div>
              </div>
            </div>
          </div>
          <hr>
          <?php 	 }
            // } ?>
          <?php $i++; endforeach;?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card box box-block bg-white" style="overflow-y: overlay; height: 242px;">
      <h2><strong><?php echo $this->lang->line('dashboard_my_awards');?></strong></h2>
      <div class="">
        <div>
          <?php $i=1; foreach($this->Xin_model->get_employee_awards() as $emp_award):
              $aw_name = $this->Awards_model->read_award_type_information($emp_award->award_type_id);
              $awdate = $this->Xin_model->set_date_format($emp_award->created_at);
             ?>
          <div class="n-item" style="margin-bottom: 0;">
            <div class="media">
              <div class="media-body">
                <div class="n-text"><strong><?php echo $aw_name[0]->award_type;?></strong> <span class="text-muted" style="float:right;"><?php echo $awdate;?> </span></div>
              </div>
            </div>
          </div>
          <hr>
          <?php $i++; endforeach;?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
