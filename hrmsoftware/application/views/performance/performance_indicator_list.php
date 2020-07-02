<?php
/* Performance Indicator view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:<?php echo $this->lang->line('xin_performance_none');?>;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_role_set');?></strong> <?php echo $this->lang->line('xin_indicator');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("performance_indicator/add_indicator") ?>" method="post" name="add_performance_indicator" id="xin-form" class="form-hrm">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-3 control-label">
                  <div class="form-group">
                    <label for="designation"><?php echo $this->lang->line('dashboard_designation');?></label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_designation');?>" name="designation_id">
                      <option value=""></option>
                      <?php foreach($all_designations as $designation) {?>
                      <option value="<?php echo $designation->designation_id?>"><?php echo $designation->designation_name?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h2><span> <strong><?php echo $this->lang->line('xin_performance_technical_competencies');?></strong> </span></h2>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_customer_experience');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="customer_experience" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"><?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_marketing');?> </label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="marketing" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_management');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="management" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_administration');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="administration" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_present_skill');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="presentation_skill" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_quality_work');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="quality_of_work" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_efficiency');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="efficiency" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                        <option value="4"> <?php echo $this->lang->line('xin_performance_expert');?></option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h2><span> <strong><?php echo $this->lang->line('xin_performance_behv_technical_competencies');?></strong> </span></h2>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_integrity');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="integrity" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_professionalism');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="professionalism" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_team_work');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="team_work" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_critical_think');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="critical_thinking" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_conflict_manage');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="conflict_management" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_attendance');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="attendance" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group">
                      <label><?php echo $this->lang->line('xin_performance_meet_deadline');?></label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <select name="ability_to_meet_deadline" class="form-control">
                        <option value=""><?php echo $this->lang->line('xin_performance_none');?></option>
                        <option value="1"> <?php echo $this->lang->line('xin_performance_beginner');?></option>
                        <option value="2"> <?php echo $this->lang->line('xin_performance_intermediate');?></option>
                        <option value="3"> <?php echo $this->lang->line('xin_performance_advanced');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 control-label">
                    <div class="form-group"> &nbsp; </div>
                  </div>
                  <div class="col-md-5 control-label">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_performance_indicators');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_designation');?></th>
          <th><?php echo $this->lang->line('left_department');?></th>
          <th><?php echo $this->lang->line('xin_added_by');?></th>
          <th><?php echo $this->lang->line('xin_created_at');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
