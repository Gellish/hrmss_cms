<?php
/* Announcement view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_announcement');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("announcement/add_announcement") ?>" method="post" name="add_announcement" id="xin-form">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title"><?php echo $this->lang->line('xin_title');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_title');?>" name="title" type="text" value="">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="designation" class="control-label"><?php echo $this->lang->line('module_company_title');?></label>
                  <select class="form-control" name="company_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                    <option value=""></option>
                    <?php foreach($get_all_companies as $company) {?>
                    <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="designation" class="control-label"><?php echo $this->lang->line('xin_location');?></label>
                  <select class="form-control" name="location_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_location');?>">
                    <option value=""></option>
                    <?php foreach($all_office_locations as $location) {?>
                    <option value="<?php echo $location->location_id?>"><?php echo $location->location_name?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="department" class="control-label"><?php echo $this->lang->line('xin_department');?></label>
                        <select class="form-control" name="department_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_department');?>">
                          <option value=""></option>
                          <?php foreach($all_departments as $department) {?>
                          <option value="<?php echo $department->department_id?>"><?php echo $department->department_name?></option>
                          <?php } ?>
                        </select>
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
              <div class="form-group">
                <label for="summary"><?php echo $this->lang->line('xin_summary');?></label>
                <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_summary');?>" name="summary" cols="30" rows="3" id="summary"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_announcements');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_title');?></th>
          <th><?php echo $this->lang->line('xin_summary');?></th>
          <th><?php echo $this->lang->line('xin_published_for');?></th>
          <th><?php echo $this->lang->line('xin_start_date');?></th>
          <th><?php echo $this->lang->line('xin_end_date');?></th>
          <th><?php echo $this->lang->line('xin_published_by');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<script type="text/javascript">var announcement_url = '<?php echo site_url("announcement") ?>';</script>