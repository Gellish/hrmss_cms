<?php
/* Attendance view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <div class="row">
        <div class="col-md-12">
          <h2><strong><?php echo $this->lang->line('xin_select_date');?></strong></h2>
          <div class="row">
            <div class="col-md-12">
            <form class="add form-hrm" method="post" name="attendance_datewise_report" id="attendance_datewise_report" action="ajax_table.php">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
              <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $session['user_id'];?>">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <input class="form-control attendance_date" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="start_date" name="start_date" type="text" value="<?php echo date('Y-m-d');?>">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <input class="form-control attendance_date" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="end_date" name="end_date" type="text" value="<?php echo date('Y-m-d');?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group"> &nbsp;
                    <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_get');?></button>
                  </div>
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row m-b-1">
  <div class="col-md-12">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('dashboard_attendance');?></strong></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('xin_e_details_date');?></th>
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
