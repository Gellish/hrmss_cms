<?php
/* Travel view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_travel');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("travel/add_travel") ?>" method="post" name="add_travel" id="xin-form">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="employee_id"><?php echo $this->lang->line('dashboard_single_employee');?></label>
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
                        <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="visit_purpose"><?php echo $this->lang->line('xin_visit_purpose');?></label>
                        <input class="form-control" placeholder="Purpose of Visit<?php echo $this->lang->line('xin_visit_purpose');?>" name="visit_purpose" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="visit_place"><?php echo $this->lang->line('xin_visit_place');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_visit_place');?>" name="visit_place" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="travel_mode"><?php echo $this->lang->line('xin_travel_mode');?></label>
                        <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_travel_mode');?>" name="travel_mode">
                          <option value="1"><?php echo $this->lang->line('xin_by_bus');?></option>
                          <option value="2"><?php echo $this->lang->line('xin_by_train');?></option>
                          <option value="3"><?php echo $this->lang->line('xin_by_plane');?></option>
                          <option value="4"><?php echo $this->lang->line('xin_by_taxi');?></option>
                          <option value="5"><?php echo $this->lang->line('xin_by_rental_car');?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="arrangement_type"><?php echo $this->lang->line('xin_arragement_type');?></label>
                        <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_arragement_type');?>" name="arrangement_type">
                          <?php foreach($travel_arrangement_types as $travel_arr_type) {?>
                          <option value="<?php echo $travel_arr_type->arrangement_type_id;?>"> <?php echo $travel_arr_type->type;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="expected_budget"><?php echo $this->lang->line('xin_expected_travel_budget');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_expected_travel_budget');?>" name="expected_budget" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="actual_budget"><?php echo $this->lang->line('xin_actual_travel_budget');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_actual_travel_budget');?>" name="actual_budget" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="10" id="description"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_travels');?>
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
          <th><?php echo $this->lang->line('xin_visit_purpose');?></th>
          <th><?php echo $this->lang->line('xin_visit_place');?></th>
          <th><?php echo $this->lang->line('xin_start_date');?></th>
          <th><?php echo $this->lang->line('xin_end_date');?></th>
          <th><?php echo $this->lang->line('xin_approval_status');?></th>
          <th><?php echo $this->lang->line('xin_added_by');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
