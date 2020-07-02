<?php
/* Job Interview view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('left_job_interview');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("job_interviews/add_interview") ?>" method="post" name="add_interview" id="xin-form">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="job_post"><?php echo $this->lang->line('xin_e_details_jtitle');?></label>
                        <select class="form-control" id="job_id" name="job_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_jtitle');?>">
                          <option value=""></option>
                          <?php foreach($all_interview_jobs as $jobs):?>
                          <option value="<?php echo $jobs->job_id;?>"><?php echo $jobs->job_title;?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="interview_date"><?php echo $this->lang->line('xin_interview_date');?></label>
                        <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_interview_date');?>" readonly name="interview_date" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" id="interviewees_ajax">
                        <label for="interviewees"><?php echo $this->lang->line('xin_interviewees_candidates_selected');?></label>
                        <select class="form-control" name="interviewees[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_candidates');?>">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="interview_place"><?php echo $this->lang->line('xin_place_of_interview');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_place_of_interview');?>" name="interview_place" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="interview_time" class="control-label"><?php echo $this->lang->line('xin_interview_time');?></label>
                        <input class="form-control timepicker" placeholder="<?php echo $this->lang->line('xin_interview_time');?>" readonly name="interview_time" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="interviewers"><?php echo $this->lang->line('xin_interviewers_employees');?></label>
                        <select multiple class="form-control" name="interviewers[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_employees');?>">
                          <option value=""></option>
                          <?php foreach($all_employees as $employee) {?>
                          <option value="<?php echo $employee->user_id;?>"><?php echo $employee->first_name. ' ' .$employee->last_name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_job_interview_description');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_job_interview_description');?>" name="description" cols="30" rows="15" id="description"></textarea>
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
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_job_interviews');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_e_details_jtitle');?></th>
          <th><?php echo $this->lang->line('xin_selected_candidates');?></th>
          <th><?php echo $this->lang->line('xin_interview_place');?></th>
          <th><?php echo $this->lang->line('xin_interview_date_time');?></th>
          <th><?php echo $this->lang->line('xin_interviewers');?></th>
          <th><?php echo $this->lang->line('xin_added_by');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
