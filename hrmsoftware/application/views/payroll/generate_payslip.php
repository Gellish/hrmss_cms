<?php
/* Generate Payslip view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-6">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('left_generate_payslip');?></strong></h2>
      <div class="row">
        <div class="col-md-12">
          <form class="m-b-1 add form-hrm" method="post" name="set_salary_details" id="set_salary_details">
            <div class="row">
              <div class="col-md-3 control-label">
                <div class="form-group">
                  <label for="department"><?php echo $this->lang->line('dashboard_single_employee');?></label>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <select id="employee_id" name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                  <option value="0"><?php echo $this->lang->line('xin_all_employees');?></option>
                  <?php foreach($all_employees as $employee) {?>
                  <option value="<?php echo $employee->user_id;?>"> <?php echo $employee->first_name.' '.$employee->last_name;?> (<?php echo $employee->username;?>)</option>
                  <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 control-label">
                <div class="form-group">
                  <label for="month_year"><?php echo $this->lang->line('xin_select_month');?></label>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <input class="form-control month_year" placeholder="<?php echo $this->lang->line('xin_select_month');?>" readonly id="month_year" name="month_year" type="text" value="<?php echo date('Y-m');?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 control-label"> </div>
              <div class="col-md-5">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_search');?></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row m-b-1">
  <div class="col-md-12">
    <div class="box box-block bg-white">
      <h2><span> <strong><?php echo $this->lang->line('xin_payment_info_for');?> <span class="text-danger" id="p_month"><?php echo date('F, Y');?></span></strong> </span></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable hover" id="xin_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('dashboard_employee_id');?></th>
              <th><?php echo $this->lang->line('xin_name');?></th>
              <th><?php echo $this->lang->line('xin_salary_type');?></th>
              <th><?php echo $this->lang->line('xin_payroll_basic_salary');?></th>
              <th><?php echo $this->lang->line('xin_payroll_net_salary');?></th>
              <th><?php echo $this->lang->line('xin_details');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('xin_action');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.hide-calendar .ui-datepicker-calendar { display:none !important; }
.hide-calendar .ui-priority-secondary { display:none !important; }
</style>
