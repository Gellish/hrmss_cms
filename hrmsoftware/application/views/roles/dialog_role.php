<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['role_id']) && $_GET['data']=='role'){
$role_resources_ids = explode(',',$role_resources);
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_role_editrole');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("roles/update").'/'.$role_id; ?>" method="post" name="edit_role" id="edit_role">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $role_id;?>">
  <input type="hidden" name="ext_name" value="<?php echo $role_name;?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="role_name"><?php echo $this->lang->line('xin_role_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_role_name');?>" name="role_name" type="text" value="<?php echo $role_name;?>">
            </div>
          </div>
        </div>
        <div class="row">
        	<input type="checkbox" name="role_resources[]" value="0" checked style="display:none;"/>
          <div class="col-md-12">
            <div class="form-group">
              <label for="role_access"><?php echo $this->lang->line('xin_role_access');?></label>
              <select class="form-control custom-select" id="role_access_modal" name="role_access" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_role_access');?>">
                <option value="">&nbsp;</option>
                <option value="1" <?php if($role_access==1):?> selected="selected" <?php endif;?>><?php echo $this->lang->line('xin_role_all_menu');?></option>
                <option value="2" <?php if($role_access==2):?> selected="selected" <?php endif;?>><?php echo $this->lang->line('xin_role_cmenu');?></option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="resources"><?php echo $this->lang->line('xin_role_resource');?></label>
              <div id="all_resources">
                <div class="demo-section k-content">
                  <div>
                    <div id="treeview_m1"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div id="all_resources">
                <div class="demo-section k-content">
                  <div>
                    <div id="treeview_m2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
				url : "<?php echo site_url("roles/role_list") ?>",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
    	});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 

		/* Edit data */
		$("#edit_role").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=role&form="+action,
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
  <script>

jQuery("#treeview_m1").kendoTreeView({
checkboxes: {
checkChildren: true,
template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>"
},
check: onCheck,
dataSource: [

{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_organization');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('1',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "", value: "1", items: [
// sub 1
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_company');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('3',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "3",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_location');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('4',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "4",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_department');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('5',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "5",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_designation');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('6',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "6",},

{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_announcements');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('8',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "8",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_policies');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('9',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "9",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_expense');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('10',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "10",},
]}, // sub 1 end
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('dashboard_employees');?>",  add_info: "", value: "11", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('11',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", items: [
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('dashboard_employees');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('13',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "13",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_set_roles');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('14',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "14",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_awards');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('15',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "15",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_transfers');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('16',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "16",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_resignations');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('17',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "17",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_travels');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('18',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "18",},

{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_promotions');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('20',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "20",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_complaints');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('21',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "21",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_warnings');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('22',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "22",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_terminations');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('23',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "23",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_employees_last_login');?>", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('26',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "26",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_employees_exit');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('27',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "27",}
]},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_performance');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('240',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "", value: "240",  items: [
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_performance_indicator');?>", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('24',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "24",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_performance_appraisal');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('25',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "25",},
]},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_timesheet');?>",  add_info: "", value: "28", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('28',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", items: [
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_attendance');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('29',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "29"},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_date_wise_attendance');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('30',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "30",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_update_attendance');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('31',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "31",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_import_attendance');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('58',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_attendance_import');?>", value: "58",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_leaves');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('32',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "32",},

{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_office_shifts');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('34',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "34",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_holidays');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('35',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "35",},
]},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_payroll');?>",  add_info: "", value: "36", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('36',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", items: [
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_payroll_templates');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('38',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_create_edit_delete_role');?>", value: "38",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_hourly_wages');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('39',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "39",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_manage_salary');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('40',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view_update');?>", value: "40",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('xin_advance_salary');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('59',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "59",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('xin_advance_salary_report');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('60',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "60",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_generate_payslip');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('41',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_generate_view');?>", value: "41",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_payment_history');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('42',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view_payslip');?>", value: "42",},
]},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_projects');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('7',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "7",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_tasks');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('33',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "33",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_tickets');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('19',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_create_edit_view_delete');?>", value: "19",},

{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_recruitment');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('43',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "", value: "43",  items: [
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_jobs_listing');?> <small><?php echo $this->lang->line('left_frontend');?></small>", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('44',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "View", value: "44"},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_job_posts');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('45',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "45",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_job_candidates');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('46',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_update_status_delete');?>", value: "46",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_job_interviews');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('47',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_delete');?>", value: "47",},
]},
]
});

jQuery("#treeview_m2").kendoTreeView({
checkboxes: {
checkChildren: true,
template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>"
},
check: onCheck,
dataSource: [
//
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_training');?>",  add_info: "", value: "48", check: "<?php if(isset($_GET['role_id'])) { 
if(in_array('48',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", items: [
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_training_list');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('49',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "49"},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_training_type');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('50',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "50",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_trainers_list');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('51',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "51",},
]},

{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_accounts');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('71',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "",value: "71",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_account_list');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('72',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "72"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_account_balances');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('73',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "73",},
	]},
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_transactions');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('74',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "",value: "74",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_deposit');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('75',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "75"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_expense');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('76',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "76",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_transfer');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('77',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "77",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_view_transactions');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('78',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "78",},
	]},
	
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_payees_payers');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('79',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "",value: "79",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_payees');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('80',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "80"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_payers');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('81',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "81",},
	]},
	
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_reports');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('82',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "",value: "82",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_account_statement');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('83',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "83"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_expense_reports');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('84',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "84",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_income_reports');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('85',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view');?>", value: "85",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_transfer_report');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('86',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "86",},
	]},
	
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('xin_files_manager');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('7',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "57",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_employees_directory');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('52',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "52",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_settings');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('53',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_view_update');?>", value: "53",},
{ id: "", class: "role-checkbox-modal custom-control-input", text: "<?php echo $this->lang->line('left_constants');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('54',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "54",},
{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_email_templates');?>", check: "<?php if(isset($_GET['role_id'])) { if(in_array('55',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_update');?>", value: "55",},
{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_db_backup');?>",  check: "<?php if(isset($_GET['role_id'])) { if(in_array('56',$role_resources_ids)): echo 'checked'; else: echo ''; endif; }?>", add_info: "<?php echo $this->lang->line('xin_create_delete_download');?>", value: "56",},
]
});
		
// show checked node IDs on datasource change
function onCheck() {
var checkedNodes = [],
treeView = jQuery("#treeview").data("kendoTreeView"),
message;
//checkedNodeIds(treeView.dataSource.view(), checkedNodes);
jQuery("#result").html(message);
}
$(document).ready(function(){
	$("#role_access_modal").change(function(){
		var sel_val = $(this).val();
		if(sel_val=='1') {
			$('.role-checkbox-modal').prop('checked', true);
		} else {
			$('.role-checkbox-modal').attr("checked", false);
		}
	});
});
</script>
<?php }
?>
