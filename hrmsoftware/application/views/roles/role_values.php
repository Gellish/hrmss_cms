<script type="text/javascript">
//$(document).ready(function(){
	jQuery("#treeview_r1").kendoTreeView({
	checkboxes: {
	checkChildren: true,
	template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>"
	},
	//<label class='custom-control custom-checkbox'><input type='checkbox' class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>
	
	//template: "<div class='checkbox'><label><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'>#= item.text #</label></div>"
	check: onCheck,
	dataSource: [
	
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_organization');?>", add_info: "", value: "1", items: [
	// sub 1
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_company');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "3",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_location');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "4",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_department');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "5",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_designation');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "6",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_announcements');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "8",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_policies');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "9",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_expense');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "10",},
	]}, // sub 1 end
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('dashboard_employees');?>",  add_info: "", value: "11",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('dashboard_employees');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "13",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_set_roles');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "14",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_awards');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "15",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_transfers');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "16",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_resignations');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "17",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_travels');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "18",},
	
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_promotions');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "20",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_complaints');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "21",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_warnings');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "22",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_terminations');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "23",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_employees_last_login');?>",  add_info: "<?php echo $this->lang->line('xin_view_update');?>", value: "26",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_employees_exit');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "27",}
	]},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_performance');?>",  add_info: "", value: "240",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_performance_indicator');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "24",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_performance_appraisal');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "25",},
	]},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_timesheet');?>",  add_info: "", value: "28",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_attendance');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "29"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_date_wise_attendance');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "30",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_update_attendance');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "31",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_import_attendance');?>",  add_info: "<?php echo $this->lang->line('xin_attendance_import');?>", value: "58",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_leaves');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "32",},
	
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_office_shifts');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "34",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_holidays');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "35",},
	]},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_payroll');?>",  add_info: "", value: "36",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_payroll_templates');?>",  add_info: "<?php echo $this->lang->line('xin_create_edit_delete_role');?>", value: "38",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_hourly_wages');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "39",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_manage_salary');?>",  add_info: "<?php echo $this->lang->line('xin_view_update');?>", value: "40",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_advance_salary');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "59",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_advance_salary_report');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "60",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_generate_payslip');?>",  add_info: "<?php echo $this->lang->line('xin_generate_view');?>", value: "41",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_payment_history');?>",  add_info: "<?php echo $this->lang->line('xin_view_payslip');?>", value: "42",},
	]},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_projects');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "7",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_tasks');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "33",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_tickets');?>",  add_info: "<?php echo $this->lang->line('xin_create_edit_view_delete');?>", value: "19",},
	
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_recruitment');?>",  add_info: "", value: "43",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_jobs_listing');?> <small><?php echo $this->lang->line('left_frontend');?></small>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "44",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_job_posts');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "45",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_job_candidates');?>",  add_info: "<?php echo $this->lang->line('xin_update_status_delete');?>", value: "46",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_job_interviews');?>",  add_info: "<?php echo $this->lang->line('xin_add_delete');?>", value: "47",},
	]},
	//
	]
	});
	
	jQuery("#treeview_r2").kendoTreeView({
	checkboxes: {
	checkChildren: true,
	template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>"
	},
	check: onCheck,
	dataSource: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_training');?>",  add_info: "", value: "48",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_training_list');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_view_delete_role_info');?>", value: "49"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_training_type');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "50",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_trainers_list');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "51",},
	]},
	
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_accounts');?>", add_info: "",value: "71",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_account_list');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "72"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_account_balances');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "73",},
	]},
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_transactions');?>", add_info: "",value: "74",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_deposit');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "75"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_expense');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "76",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_transfer');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "77",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_view_transactions');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "78",},
	]},
	
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_payees_payers');?>", add_info: "",value: "79",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_payees');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "80"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_payers');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "81",},
	]},
	
	{ id: "", class: "role-checkbox custom-control-input",text: "<?php echo $this->lang->line('xin_acc_reports');?>", add_info: "",value: "82",  items: [
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_account_statement');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "83"},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_expense_reports');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "84",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_income_reports');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "85",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_acc_transfer_report');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "86",},
	]},
	
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('xin_files_manager');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "57",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_employees_directory');?>",  add_info: "<?php echo $this->lang->line('xin_view');?>", value: "52",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_settings');?>",  add_info: "<?php echo $this->lang->line('xin_view_update');?>", value: "53",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_constants');?>",  add_info: "<?php echo $this->lang->line('xin_add_edit_delete_role_info');?>", value: "54",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_email_templates');?>",  add_info: "<?php echo $this->lang->line('xin_update');?>", value: "55",},
	{ id: "", class: "role-checkbox custom-control-input", text: "<?php echo $this->lang->line('left_db_backup');?>",  add_info: "<?php echo $this->lang->line('xin_create_delete_download');?>", value: "56",},
	//
	]
	});
//});
// show checked node IDs on datasource change
function onCheck() {
var checkedNodes = [],
		treeView = jQuery("#treeview2").data("kendoTreeView"),
		message;
		jQuery("#result").html(message);
}
</script>