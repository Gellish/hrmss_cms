<?php
/* Office Shift view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('left_office_shift');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("timesheet/add_office_shift") ?>" method="post" name="add_office_shift" id="xin-form">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="name"><?php echo $this->lang->line('xin_shift_name');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_shift_name');?>" name="shift_name" type="text" value="" id="name">
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_monday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-1" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="monday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-1" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="monday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="1"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_tuesday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-2" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="tuesday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-2" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="tuesday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="2"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_wednesday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-3" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="wednesday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-3" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="wednesday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="3"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_thursday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-4" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="thursday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-4" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="thursday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="4"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_friday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-5" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="friday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-5" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="friday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="5"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_saturday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-6" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="saturday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-6" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="saturday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="6"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="time" class="col-md-2"><?php echo $this->lang->line('xin_sunday');?></label>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-7" placeholder="<?php echo $this->lang->line('xin_in_time');?>" readonly name="sunday_in_time" type="text" value="">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control timepicker clear-7" placeholder="<?php echo $this->lang->line('xin_out_time');?>" readonly name="sunday_out_time" type="text" value="">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary clear-time" data-clear-id="7"><?php echo $this->lang->line('xin_clear');?></button>
                    </div>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_office_shift');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_option');?></th>
          <th><?php echo $this->lang->line('xin_day');?></th>
          <th><?php echo $this->lang->line('xin_monday');?></th>
          <th><?php echo $this->lang->line('xin_tuesday');?></th>
          <th><?php echo $this->lang->line('xin_wednesday');?></th>
          <th><?php echo $this->lang->line('xin_thursday');?></th>
          <th><?php echo $this->lang->line('xin_friday');?></th>
          <th><?php echo $this->lang->line('xin_saturday');?></th>
          <th><?php echo $this->lang->line('xin_sunday');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
