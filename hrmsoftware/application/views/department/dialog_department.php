<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['department_id']) && $_GET['data']=='department'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_department_edit');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("department/update").'/'.$department_id; ?>" method="post" name="edit_department" id="edit_department">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $department_id;?>">
  <input type="hidden" name="ext_name" value="<?php echo $department_name;?>">
  <div class="modal-body">
      <div class="form-group">
        <label for="department-name" class="form-control-label"><?php echo $this->lang->line('xin_name');?>:</label>
        <input type="text" class="form-control" name="department_name" value="<?php echo $department_name?>">
      </div>
      <div class="form-group">
      <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
        <select class="form-control" name="company_id" id="ajx_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
          <option value=""></option>
          <?php foreach($get_all_companies as $company) {?>
          <option value="<?php echo $company->company_id?>"<?php if($company_id==$company->company_id):?> selected="selected"<?php endif;?>><?php echo $company->name?></option>
          <?php } ?>
        </select>
    </div>
      <div class="form-group" id="location_ajx">
          <label for="name"><?php echo $this->lang->line('xin_location');?></label>
          <select name="location_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_location');?>">
        <option value=""></option>
        <?php foreach($all_locations as $location) {?>
        <option value="<?php echo $location->location_id;?>" <?php if($location_id==$location->location_id):?> selected="selected"<?php endif;?>> <?php echo $location->location_name;?></option>
        <?php } ?>
        </select>
        </div>
        <div class="form-group">
          <label for="name"><?php echo $this->lang->line('xin_department_head');?></label>
          <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_department_head');?>">
        <option value=""></option>
        <?php foreach($all_employees as $employee) {?>
        <?php
        /* get user_role */
        $user_role = $this->Xin_model->read_user_role_info($employee->user_role_id);
        ?>
        <option value="<?php echo $employee->user_id;?>" <?php if($employee_id==$employee->user_id):?> selected="selected"<?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?> (<?php echo $user_role[0]->role_name;?>)</option>
        <?php } ?>
        </select>
        </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
  </div>
</form>
<script type="text/javascript">
 $(document).ready(function(){
					
		// On page load: datatable
		var xin_table = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : "<?php echo site_url("department/department_list") ?>",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
    	});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 
		
		jQuery("#ajx_company").change(function(){
			jQuery.get(base_url+"/get_locations/"+jQuery(this).val(), function(data, status){
				jQuery('#location_ajx').html(data);
			});
		});

		/* Edit data */
		$("#edit_department").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=department&form="+action,
				cache: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('.save').prop('disabled', false);
					} else {
						xin_table.api().ajax.reload(function(){ 
							toastr.success(JSON.result);
						}, true);
						$('.edit-modal-data').modal('toggle');
						$('.save').prop('disabled', false);
					}
				}
			});
		});
	});	
  </script>
<?php }
?>
