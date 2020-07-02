<?php
/* Leave Detail view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']);?>

<div class="row m-b-1">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_leave_detail');?></strong></h2>
      <table class="table table-striped m-md-b-0">
        <tbody>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_employee');?></th>
            <td class="text-right"><?php echo $full_name;?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_leave_type');?></th>
            <td class="text-right"><?php echo $type;?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_applied_on');?></th>
            <td class="text-right"><?php echo $this->Xin_model->set_date_format($created_at);?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_start_date');?></th>
            <td class="text-right"><?php echo $this->Xin_model->set_date_format($from_date);?></td>
          </tr>
          <tr>
            <th scope="row"><?php echo $this->lang->line('xin_end_date');?></th>
            <td class="text-right"><?php echo $this->Xin_model->set_date_format($to_date);?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <div class="the-notes info"><?php echo $reason;?></div>
    </div>
  </div>
  <?php if($user[0]->user_role_id == 1) {?>
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_update_status');?></strong></h2>
      <form action="<?php echo site_url("timesheet/update_leave_status").'/'.$leave_id;?>" method="post" name="update_status" id="update_status">
        <input type="hidden" name="_token_status" value="<?php echo $leave_id;?>">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
              <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
                <option value="1" <?php if($status=='1'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_pending');?></option>
                <option value="2" <?php if($status=='2'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_approved');?></option>
                <option value="3" <?php if($status=='3'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_rejected');?></option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="remarks"><?php echo $this->lang->line('xin_remarks');?></label>
              <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_remarks');?>" name="remarks" id="remarks" cols="30" rows="5"><?php echo $remarks;?></textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </form>
    </div>
  </div>
  <?php } ?>
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_leave_statistics');?> </strong> <?php echo $this->lang->line('xin_of');?> <?php echo $full_name;?></h2>
      <?php foreach($all_leave_types as $type) {?>
      <?php $count_l = $this->Timesheet_model->count_total_leaves($type->leave_type_id,$employee_id);?>
      <?php
			$count_data = $count_l / $type->days_per_year * 100;
			// progress
			if($count_data <= 20) {
				$progress_class = 'progress-success';
			} else if($count_data > 20 && $count_data <= 50){
				$progress_class = 'progress-info';
			} else if($count_data > 50 && $count_data <= 75){
				$progress_class = 'progress-warning';
			} else {
				$progress_class = 'progress-danger';
			}
		?>
      <div id="leave-statistics">
        <p><strong><?php echo $type->type_name;?> (<?php echo $count_l;?>/<?php echo $type->days_per_year;?>)</strong></p>
        <progress class="progress <?php echo $progress_class;?>" value="<?php echo $count_data;?>" max="100"></progress>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
