<?php
/* Training view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('left_training');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("training/add_training"); ?>" method="post" name="add_training" id="xin-form">
          <input type="hidden" name="_user" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="training_type"><?php echo $this->lang->line('left_training_type');?></label>
                        <select class="form-control" name="training_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_training_type');?>">
                          <option value=""></option>
                          <?php foreach($all_training_types as $training_type) {?>
                          <option value="<?php echo $training_type->training_type_id?>"><?php echo $training_type->type?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="trainer"><?php echo $this->lang->line('xin_trainer');?></label>
                        <select class="form-control" name="trainer" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_trainer');?>">
                          <option value=""></option>
                          <?php foreach($all_trainers as $trainer) {?>
                          <option value="<?php echo $trainer->trainer_id?>"><?php echo $trainer->first_name.' '.$trainer->last_name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="training_cost"><?php echo $this->lang->line('xin_training_cost');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_training_cost');?>" name="training_cost" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="employee" class="control-label"><?php echo $this->lang->line('xin_employee');?></label>
                        <select multiple class="form-control" name="employee_id[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee');?>">
                          <option value=""></option>
                          <?php foreach($all_employees as $employee) {?>
                          <option value="<?php echo $employee->user_id;?>"><?php echo $employee->first_name.' '.$employee->last_name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" id="description"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_training');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_employee');?></th>
          <th><?php echo $this->lang->line('left_training_type');?></th>
          <th><?php echo $this->lang->line('xin_trainer');?></th>
          <th><?php echo $this->lang->line('xin_training_duration');?></th>
          <th><?php echo $this->lang->line('xin_cost');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
