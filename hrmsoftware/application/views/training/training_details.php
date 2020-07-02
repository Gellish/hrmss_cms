<?php
/*
* Training Detail view
*/
$session = $this->session->userdata('username');
?>

<div class="row m-b-1">
<div class="col-md-4">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_training_details');?></strong></h2>
    <table class="table table-striped m-md-b-0">
      <tbody>
        <tr>
          <th scope="row"><?php echo $this->lang->line('left_training_type');?></th>
          <td class="text-right"><?php echo $type;?></td>
        </tr>
        <?php $user = $this->Xin_model->read_user_info($session['user_id']);
				  	if($user[0]->user_role_id==1){?>
        <tr>
          <th scope="row"><?php echo $this->lang->line('xin_trainer');?></th>
          <td class="text-right"><?php echo $trainer_name;?></td>
        </tr>
        <?php } ?>
        <tr>
          <th scope="row"><?php echo $this->lang->line('xin_training_cost');?></th>
          <td class="text-right"><?php echo $this->Xin_model->currency_sign($training_cost);?></td>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('xin_start_date');?></th>
          <td class="text-right"><?php echo $this->Xin_model->set_date_format($start_date);?></td>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('xin_end_date');?></th>
          <td class="text-right"><?php echo $this->Xin_model->set_date_format($finish_date);?></td>
        </tr>
        <tr>
          <th scope="row"><?php echo $this->lang->line('xin_e_details_date');?></th>
          <td class="text-right"><?php echo $this->Xin_model->set_date_format($created_at);?></td>
        </tr>
      </tbody>
    </table>
    <?php if($description!='' && $description!='<p><br></p>'):?>
    <div class="the-notes info">
      <p><?php echo $description;?><br>
      </p>
    </div>
    <?php endif;?>
  </div>
</div>
<div class="col-md-8">
<div class="box box-block bg-white">
<div class="wizard" role="tabpanel">
<h2><strong><?php echo $this->lang->line('xin_details');?></strong></h2>
<div class="tab-content m-b-1">
<div role="tabpanel" class="tab-pane active fade in" id="detail" style="overflow:auto;">
<div class="col-md-6">
  <h2><strong><?php echo $this->lang->line('xin_training_employees_s');?></strong></h2>
  <div class="items-list" id="all_employees_list">
    <?php if($employee_id!='') {?>
    <?php $employee_ids = explode(',',$employee_id); foreach($employee_ids as $assign_id) {?>
    <?php $e_name = $this->Xin_model->read_user_info($assign_id);?>
    <?php if(!is_null($e_name)){ ?>
    <?php $_designation = $this->Designation_model->read_designation_information($e_name[0]->designation_id);?>
    <?php
	  if(!is_null($_designation)){
		$designation_name = $_designation[0]->designation_name;
	  } else {
		$designation_name = '--';	
	  }
	  ?>
    <?php
		if($e_name[0]->profile_picture!='' && $e_name[0]->profile_picture!='no file') {
			$u_file = base_url().'uploads/profile/'.$e_name[0]->profile_picture;
		} else {
			if($e_name[0]->gender=='Male') { 
				$u_file = base_url().'uploads/profile/default_male.jpg';
			} else {
				$u_file = base_url().'uploads/profile/default_female.jpg';
			}
		} ?>
    <div class="il-item">
      <?php if($user[0]->user_role_id==1):?>
      <a class="text-black" href="<?php echo site_url()?>employees/detail/<?php echo $e_name[0]->user_id;?>">
      <?php endif;?>
      <div class="media">
        <div class="media-left">
          <div class="avatar box-48"> <img class="b-a-radius-circle" src="<?php echo $u_file;?>" alt=""> <i class="status bg-secondary bottom right"></i> </div>
        </div>
        <div class="media-body">
          <h6 class="media-heading"><?php echo $e_name[0]->first_name.' '.$e_name[0]->last_name;?></h6>
          <span class="text-muted"><?php echo $designation_name;?></span> </div>
      </div>
      <div class="il-icon"><i class="fa fa-angle-right"></i></div>
      <?php if($user[0]->user_role_id==1):?>
      </a>
      <?php endif;?>
    </div>
    <?php } }?>
    <?php } else { ?>
    <span>&nbsp;</span>
    <?php } ?>
  </div>
</div>
<?php if($user[0]->user_role_id==1){?>
<div class="col-md-6">
  <form action="<?php echo site_url("training/update_status") ?>" method="post" name="update_status" id="update_status">
    <input type="hidden" name="token_status" id="token_status" value="<?php echo $training_id;?>">
    <h2><strong><?php echo $this->lang->line('xin_update_status');?></strong></h2>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="status"><?php echo $this->lang->line('left_performance');?></label>
          <select class="form-control" name="performance" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_performance');?>">
            <option value="0" <?php if($performance=='0'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_not_included');?></option>
            <option value="1" <?php if($performance=='1'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_satisfactory');?></option>
            <option value="2" <?php if($performance=='2'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_average');?></option>
            <option value="3" <?php if($performance=='3'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_poor');?></option>
            <option value="4" <?php if($performance=='4'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_excellent');?></option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
          <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
            <option value="0" <?php if($training_status=='0'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_pending');?></option>
            <option value="1" <?php if($training_status=='1'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_started');?></option>
            <option value="2" <?php if($training_status=='2'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_completed');?></option>
            <option value="3" <?php if($training_status=='3'):?> selected <?php endif;?>><?php echo $this->lang->line('xin_terminated');?></option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="status"><?php echo $this->lang->line('xin_remarks');?></label>
          <textarea class="form-control" name="remarks" rows="4" cols="15" placeholder="<?php echo $this->lang->line('xin_remarks');?>"><?php echo $remarks;?></textarea>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
  </form>
</div>
<?php } else {?>
<div class="col-md-6">
<form action="module/training/hrm_json_training.php" method="post" name="update_status" id="update_status">
<input type="hidden" name="_token_status" value="<?php echo $training_id;?>">
<h2><strong><?php echo $this->lang->line('xin_trainer');?></strong></h2>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="status"><?php echo $trainer_name;?></label>
    </div>
  </div>
</div>
</div>
<?php } ?>
<div>&nbsp;</div>
</div>
<!-- tab -->
</div>
</div>
</div>
</div>
</div>
</div>
