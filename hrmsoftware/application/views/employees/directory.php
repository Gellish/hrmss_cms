<?php
/* Employee Directory view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row row-sm">
  <?php foreach($all_employees as $employee):?>
  <?php $designation = $this->Designation_model->read_designation_information($employee->designation_id);?>
  <?php
  	if(!is_null($designation)){
		$designation_name = strtolower($designation[0]->designation_name);
	  } else {
		$designation_name = '--';	
	  }
  ?>
  <?php
		if($employee->profile_picture!='' && $employee->profile_picture!='no file') {
			$u_file = base_url().'uploads/profile/'.$employee->profile_picture;
		} else {
			if($employee->gender=='Male') { 
				$u_file = base_url().'uploads/profile/default_male.jpg';
			} else {
				$u_file = base_url().'uploads/profile/default_female.jpg';
			}
		}
		
		if($employee->is_active==1):
			$status = '<span class="tag tag-success">'.$this->lang->line('xin_employees_active').'</span>';
		else:
			$status = '<span class="tag tag-danger">'.$this->lang->line('xin_employees_inactive').'</span>';
		endif;
			?>
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <div class="row">
        <div class="col-md-4 col-sm-4 text-center"> <img class="img-fluid b-a-radius-circle" src="<?php echo $u_file;?>" alt=""> </div>
        <div class="col-md-8 col-sm-8">
          <h5><a href="<?php echo site_url()?>employees/detail/<?php echo $employee->user_id;?>/"><?php echo $employee->first_name;?> <?php echo $employee->last_name;?></a></h5>
          <span class="tag tag-success"><?php echo $designation_name;?></span>
          <p> </p>
          <address>
          <?php echo $employee->address;?><br>
          <abbr title="<?php echo $this->lang->line('xin_phone');?>">P:</abbr> <?php echo $employee->contact_no;?><br>
          <abbr title="<?php echo $this->lang->line('dashboard_xin_status');?>"><i class="fa fa-user"></i></abbr> <span class="s-text"><?php echo $status;?></span>
          </address>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
