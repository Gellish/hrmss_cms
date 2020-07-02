<?php
/* Payroll Template view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_setup');?></strong> <?php echo $this->lang->line('xin_payroll_template');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form class="form-hrm" action="<?php echo site_url("payroll/add_template") ?>" method="post" name="add_template" id="xin-form" autocomplete="off">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="salary_grades"><?php echo $this->lang->line('xin_name_of_template');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_name_of_template');?>" name="salary_grades" type="text">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basic_salary" class="control-label"><?php echo $this->lang->line('xin_payroll_basic_salary');?></label>
                        <input class="form-control salary" placeholder="<?php echo $this->lang->line('xin_payroll_basic_salary');?>" name="basic_salary" type="text">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="overtime_rate" class="control-label"><?php echo $this->lang->line('xin_payroll_overtime_rate');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_payroll_overtime_rate');?>" name="overtime_rate" type="text">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="house_rent_allowance"><?php echo $this->lang->line('xin_Payroll_house_rent_allowance');?></label>
                        <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="house_rent_allowance" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="medical_allowance"><?php echo $this->lang->line('xin_payroll_medical_allowance');?></label>
                        <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="medical_allowance" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="travelling_allowance"><?php echo $this->lang->line('xin_payroll_travel_allowance');?></label>
                        <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="travelling_allowance" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dearness_allowance"><?php echo $this->lang->line('xin_payroll_dearness_allowance');?></label>
                        <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="dearness_allowance" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="provident_fund"><?php echo $this->lang->line('xin_payroll_provident_fund_de');?></label>
                        <input class="form-control deduction" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="provident_fund" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tax_deduction"><?php echo $this->lang->line('xin_payroll_tax_deduction_de');?></label>
                        <input class="form-control deduction" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="tax_deduction" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="security_deposit"><?php echo $this->lang->line('xin_payroll_security_deposit');?></label>
                        <input class="form-control deduction" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="security_deposit" type="text" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-right">
                  <h2><strong><?php echo $this->lang->line('xin_payroll_total_salary_details');?></strong></h2>
                  <table class="table table-bordered custom-table">
                    <tbody>
                      <tr>
                        <th class="col-sm-4 vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_gross_salary');?> :</th>
                        <td class="hidden-print"><input type="text" name="gross_salary" readonly id="total" class="form-control"></td>
                      </tr>
                      <tr>
                        <th class="col-sm-4 vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_total_allowance');?> :</th>
                        <td class="hidden-print"><input type="text" name="total_allowance" readonly id="total_allowance" class="form-control"></td>
                      </tr>
                      <tr>
                        <th class="col-sm-4 vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_total_deduction');?> :</th>
                        <td class="hidden-print"><input type="text" name="total_deduction" readonly id="total_deduction" class="form-control"></td>
                      </tr>
                      <tr>
                        <th class="col-sm-4 vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_net_salary');?> :</th>
                        <td class="hidden-print"><input type="text" name="net_salary" readonly id="net_salary" class="form-control"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <button type="submit" class="btn btn-primary save primary-btn-block col-right"><?php echo $this->lang->line('xin_save');?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_payroll_templates');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_payroll_template');?></th>
          <th><?php echo $this->lang->line('xin_payroll_basic_salary');?></th>
          <th><?php echo $this->lang->line('xin_payroll_net_salary');?></th>
          <th><?php echo $this->lang->line('xin_payroll_total_allowance');?></th>
          <th><?php echo $this->lang->line('xin_created_by');?></th>
          <th><?php echo $this->lang->line('xin_created_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
