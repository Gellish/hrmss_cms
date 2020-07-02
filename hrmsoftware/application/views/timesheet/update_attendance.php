<?php
/* Update Attendance view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <div class="row">
        <div class="col-md-12">
          <h2><strong><?php echo $this->lang->line('left_update_attendance');?></strong></h2>
          <div class="row">
            <div class="col-md-12">
            <form class="add form-hrm" method="post" name="update_attendance_report" id="update_attendance_report">
              <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $session['user_id'];?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="date"><?php echo $this->lang->line('xin_e_details_date');?></label>
                    <input class="form-control attendance_date" placeholder="<?php echo $this->lang->line('xin_e_details_date');?>" readonly id="attendance_date" name="attendance_date" type="text" value="<?php echo date('Y-m-d');?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="employee"><?php echo $this->lang->line('xin_employee');?></label>
                    <select name="employee_id" id="employee_id" class="form-control employee-data" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                      <?php foreach($all_employees as $employee) {?>
                      <option value="<?php echo $employee->user_id;?>" <?php if($session['user_id']==$employee->user_id):?> selected <?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_get');?></button>
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('left_update_attendance');?></strong>
        <div class="add-record-btn">
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-modal-data"> <i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
        </div>
      </h2>
      <p>
      <h4 id="emp_name">
        <?php //echo $employee_name;?>
      </h4>
      </p>
      <p><strong id="office_shift">
        <?php //echo $office_shift;?>
        </strong></p>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_in_time');?></th>
              <th><?php echo $this->lang->line('xin_out_time');?></th>
              <th><?php echo $this->lang->line('dashboard_total_work');?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
