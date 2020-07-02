<?php
/* Payroll > Advance Salary view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_request');?></strong> <?php echo $this->lang->line('xin_advance_salary');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form class="m-b-1" action="<?php echo site_url("payroll/add_advance_salary") ?>" method="post" name="add_advance_salary" id="xin-form">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="employee"><?php echo $this->lang->line('dashboard_single_employee');?></label>
                    <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                      <option value=""></option>
                      <?php foreach($all_employees as $employee) {?>
                      <option value="<?php echo $employee->user_id;?>"> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="month_year"><?php echo $this->lang->line('xin_award_month_year');?></label>
                        <input class="form-control d_month_year" placeholder="<?php echo $this->lang->line('xin_award_month_year');?>" readonly name="month_year" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="end_date"><?php echo $this->lang->line('xin_amount');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="amount" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="edu_role"><?php echo $this->lang->line('xin_one_time_deduct');?></label>
                        <select name="one_time_deduct" class="select2 one_time_deduct" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_one_time_deduct');?>">
                          <option value="1"><?php echo $this->lang->line('xin_yes');?></option>
                          <option value="0"><?php echo $this->lang->line('xin_no');?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="edu_role"><?php echo $this->lang->line('xin_emi_salary');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_monthly_installment');?>" name="monthly_installment" type="text" id="monthly_installment" disabled="disabled">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="is_publish"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                        <select name="status" class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_status');?>">
                          <option value="0"><?php echo $this->lang->line('xin_pending');?></option>
                          <option value="1"><?php echo $this->lang->line('xin_accepted');?></option>
                          <option value="2"><?php echo $this->lang->line('xin_rejected');?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_reason');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_reason');?>" name="reason" cols="30" rows="15" id="reason"></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_advance_salaries');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
          <th><?php echo $this->lang->line('xin_amount');?></th>
          <th><?php echo $this->lang->line('xin_award_month_year');?></th>
          <th><?php echo $this->lang->line('xin_one_time_deduct');?></th>
          <th><?php echo $this->lang->line('xin_emi_salary');?></th>
          <th><?php echo $this->lang->line('xin_created_at');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<style type="text/css">
.hide-calendar .ui-datepicker-calendar { display:none !important; }
.hide-calendar .ui-priority-secondary { display:none !important; }
</style>
