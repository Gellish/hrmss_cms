<?php
/* Job List/Post view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_job');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("job_post/add_job") ?>" method="post" name="add_job" id="xin-form">
          <input type="hidden" name="_user" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="title"><?php echo $this->lang->line('xin_e_details_jtitle');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_jtitle');?>" name="job_title" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="job_type"><?php echo $this->lang->line('xin_job_type');?></label>
                        <select class="form-control" name="job_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_job_type');?>">
                          <option value=""></option>
                          <?php foreach($all_job_types as $job_type) {?>
                          <option value="<?php echo $job_type->job_type_id?>"><?php echo $job_type->type?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="designation"><?php echo $this->lang->line('dashboard_designation');?></label>
                        <select class="form-control" name="designation_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_designation');?>">
                          <option value=""></option>
                          <?php foreach($all_designations as $designation) {?>
                          <option value="<?php echo $designation->designation_id?>"><?php echo $designation->designation_name?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                        <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
                          <option value="1"><?php echo $this->lang->line('xin_published');?></option>
                          <option value="2"><?php echo $this->lang->line('xin_unpublished');?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="vacancy"><?php echo $this->lang->line('xin_number_of_positions');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_number_of_positions');?>" name="vacancy" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="date_of_closing" class="control-label"><?php echo $this->lang->line('xin_date_of_closing');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_date_of_closing');?>" readonly name="date_of_closing" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gender"><?php echo $this->lang->line('xin_employee_gender');?></label>
                        <select class="form-control" name="gender" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee_gender');?>">
                          <option value="0"><?php echo $this->lang->line('xin_gender_male');?></option>
                          <option value="1"><?php echo $this->lang->line('xin_gender_female');?></option>
                          <option value="2"><?php echo $this->lang->line('xin_job_no_preference');?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="experience" class="control-label"><?php echo $this->lang->line('xin_job_minimum_experience');?></label>
                        <select class="form-control" name="experience" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_job_minimum_experience');?>">
                          <option value="0"><?php echo $this->lang->line('xin_job_fresh');?></option>
                          <option value="1"><?php echo $this->lang->line('xin_job_experience_define_1year');?></option>
                          <option value="2"><?php echo $this->lang->line('xin_job_experience_define_2years');?></option>
                          <option value="3"><?php echo $this->lang->line('xin_job_experience_define_3years');?></option>
                          <option value="4"><?php echo $this->lang->line('xin_job_experience_define_4years');?></option>
                          <option value="5"><?php echo $this->lang->line('xin_job_experience_define_5years');?></option>
                          <option value="6"><?php echo $this->lang->line('xin_job_experience_define_6years');?></option>
                          <option value="7"><?php echo $this->lang->line('xin_job_experience_define_7years');?></option>
                          <option value="8"><?php echo $this->lang->line('xin_job_experience_define_8years');?></option>
                          <option value="9"><?php echo $this->lang->line('xin_job_experience_define_9years');?></option>
                          <option value="10"><?php echo $this->lang->line('xin_job_experience_define_10years');?></option>
                          <option value="11"><?php echo $this->lang->line('xin_job_experience_define_plus_10years');?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="long_description"><?php echo $this->lang->line('xin_long_description');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_long_description');?>" name="long_description" cols="30" rows="15" id="long_description"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="short_description"><?php echo $this->lang->line('xin_short_description');?></label>
                <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_short_description');?>" name="short_description" cols="30" rows="3"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_jobs');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
          <th><?php echo $this->lang->line('left_designation');?></th>
          <th><?php echo $this->lang->line('xin_job_type');?></th>
          <th><?php echo $this->lang->line('xin_no_of_positions');?></th>
          <th><?php echo $this->lang->line('xin_closing_date');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
          <th><?php echo $this->lang->line('xin_role_added_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
