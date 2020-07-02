<?php
/* Leave view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_leave');?></strong>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("timesheet/add_leave") ?>" method="post" name="add_leave" id="xin-form">
          <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
          <input type="hidden" name="employee_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="leave_type" class="control-label"><?php echo $this->lang->line('xin_leave_type');?></label>
                    <select class="form-control" name="leave_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_leave_type');?>">
                      <option value=""></option>
                      <?php foreach($all_leave_types as $type) {?>
                      <option value="<?php echo $type->leave_type_id;?>"> <?php echo $type->type_name;?></option>
                      <?php } ?>
                    </select>
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
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_remarks');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_remarks');?>" name="remarks" cols="30" rows="15" id="remarks"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="summary"><?php echo $this->lang->line('xin_leave_reason');?></label>
                <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_leave_reason');?>" name="reason" cols="30" rows="3" id="reason"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_leave');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_leave');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_employee');?></th>
          <th><?php echo $this->lang->line('xin_leave_type');?></th>
          <th><?php echo $this->lang->line('xin_leave_duration');?></th>
          <th><?php echo $this->lang->line('xin_applied_on');?></th>
          <th><?php echo $this->lang->line('xin_reason');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
