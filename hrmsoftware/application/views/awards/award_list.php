<?php
/* Awards view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_award');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("awards/add_award") ?>" method="post" name="add_award" id="xin-form">
          <input type="hidden" name="_user" value="<?php echo $session['user_id'];?>">
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
                        <label for="award_type"><?php echo $this->lang->line('xin_award_type');?></label>
                        <select name="award_type_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_award_type');?>">
                          <option value=""></option>
                          <?php foreach($all_award_types as $award_type) {?>
                          <option value="<?php echo $award_type->award_type_id;?>"><?php echo $award_type->award_type;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="award_date"><?php echo $this->lang->line('xin_e_details_date');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_award_date');?>" readonly name="award_date" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="month_year"><?php echo $this->lang->line('xin_award_month_year');?></label>
                        <input class="form-control d_month_year" placeholder="<?php echo $this->lang->line('xin_award_month_year');?>" readonly name="month_year" type="text">
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="15" id="description"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="gift"><?php echo $this->lang->line('xin_gift');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_gift');?>" name="gift" type="text">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="cash"><?php echo $this->lang->line('xin_cash');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_cash');?>" name="cash" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class='form-group'>
                      <div><label for="photo"><?php echo $this->lang->line('xin_award_photo');?></label></div>
                      	<span class="btn btn-primary btn-file">
                          <?php echo $this->lang->line('xin_browse');?> <input type="file" name="award_picture" id="award_picture">
                        </span>
                      <br>
                      <small><?php echo $this->lang->line('xin_company_file_type');?></small> </div>
                  </div>
                  </div>
              <div class="form-group">
                <label for="award_information"><?php echo $this->lang->line('xin_award_info');?></label>
                <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_award_info');?>" name="award_information" cols="30" rows="3" id="award_information"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_awards');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_employee_id');?></th>
          <th><?php echo $this->lang->line('xin_employee_name');?></th>
          <th><?php echo $this->lang->line('xin_award_name');?></th>
          <th><?php echo $this->lang->line('xin_gift');?></th>
          <th><?php echo $this->lang->line('xin_cash_price');?></th>
          <th><?php echo $this->lang->line('xin_award_month_year');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<style type="text/css">
.hide-calendar .ui-datepicker-calendar { display:none !important; }
.hide-calendar .ui-priority-secondary { display:none !important; }
</style>
