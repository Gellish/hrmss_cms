<?php
/* Performance Appraisal view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_give_performance_appraisal');?></strong>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <form action="<?php echo site_url("performance_appraisal/add_appraisal") ?>" method="post" name="add_appraisal" id="xin-form" class="form-xin">
      <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
      <div class="row m-b-1">
        <div class="col-md-12">
          <div class="box box-block bg-white">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3 control-label">
                    <div class="form-group">
                      <label for="employee"><?php echo $this->lang->line('dashboard_single_employee');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>" name="employee_id" id="employee_id">
                        <option value=""></option>
                        <?php foreach($all_employees as $employee) {?>
                        <option value="<?php echo $employee->user_id;?>"><?php echo $employee->first_name.' '.$employee->last_name;?></option>
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
                  <div class="col-md-5">
                    <div class="form-group">
                      <input class="form-control month_year" placeholder="<?php echo $this->lang->line('xin_select_month');?>" readonly id="month_year" name="month_year" type="text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row m-b-1">
            <div class="col-md-6">
              <div class="box bg-white">
                <table class="table table-grey-head m-md-b-0">
                  <thead>
                    <tr>
                      <th colspan="5"><?php echo $this->lang->line('xin_performance_technical_competencies');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="2"><?php echo $this->lang->line('xin_indicator');?></th>
                      <th colspan="2"><?php echo $this->lang->line('xin_expected_value');?></th>
                      <th><?php echo $this->lang->line('xin_set_value');?></th>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_customer_experience');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_intermediate');?></td>
                      <td><select name="customer_experience" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_marketing');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_advanced');?></td>
                      <td><select name="marketing" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_management');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_advanced');?></td>
                      <td><select name="management" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_administration');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_advanced');?></td>
                      <td><select name="administration" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_present_skill');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_expert');?></td>
                      <td><select name="presentation_skill" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_quality_work');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_expert');?></td>
                      <td><select name="quality_of_work" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_efficiency');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_expert');?></td>
                      <td><select name="efficiency" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                          <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                        </select></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box bg-white">
                <table class="table table-grey-head m-md-b-0">
                  <thead>
                    <tr>
                      <th colspan="5"><?php echo $this->lang->line('xin_performance_behv_technical_competencies');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="2"><?php echo $this->lang->line('xin_indicator');?></th>
                      <th colspan="2"><?php echo $this->lang->line('xin_expected_value');?></th>
                      <th><?php echo $this->lang->line('xin_set_value');?></th>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_integrity');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_beginner');?></td>
                      <td><select name="integrity" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_professionalism');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_beginner');?></td>
                      <td><select name="professionalism" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_team_work');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_intermediate');?></td>
                      <td><select name="team_work" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_critical_think');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_advanced');?></td>
                      <td><select name="critical_thinking" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_conflict_manage');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_intermediate');?></td>
                      <td><select name="conflict_management" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_attendance');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_intermediate');?></td>
                      <td><select name="attendance" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="2"><?php echo $this->lang->line('xin_performance_meet_deadline');?></td>
                      <td colspan="2"><?php echo $this->lang->line('xin_performance_advanced');?></td>
                      <td><select name="ability_to_meet_deadline" class="form-control">
                          <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                          <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                          <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                          <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        </select></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="m-b-1">
          <div class="col-md-6">
            <div class="box box-block bg-white">
              <div class="form-group">
                <label for="remarks"><?php echo $this->lang->line('xin_remarks');?></label>
                <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_remarks');?>" name="remarks" cols="30" rows="15" id="remarks"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="remarks">&nbsp;</label>
              <button type="submit" class="btn btn-primary save u-primary-btn-block"><?php echo $this->lang->line('xin_save');?></button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_performance_apps');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
          <th><?php echo $this->lang->line('left_department');?></th>
          <th><?php echo $this->lang->line('dashboard_designation');?></th>
          <th><?php echo $this->lang->line('xin_performance_app_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<style type="text/css">
.hide-calendar .ui-datepicker-calendar { display:none !important; }
.hide-calendar .ui-priority-secondary { display:none !important; }
</style>
