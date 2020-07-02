$(document).ready(function(){			

$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
$('[data-plugin="select_hrm"]').select2({ width:'100%' });	
	
jQuery("#company_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=1&data=company_info&type=company_info&form="+action,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});


$("#file_setting_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = $(this), action = obj.attr('name');
	$('.save').prop('disabled', true);
	if($('#view_all_files').is(':checked')){
		var view_all_files = $("#view_all_files").val();
	} else {
		var view_all_files = '';
	}
	$.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=2&type=setting_info&form="+action+"&view_all_files="+view_all_files,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);	
				$('.save').prop('disabled', false);						
			}
		}
	});
});

jQuery("#system_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	if($('#enable_page_rendered').is(':checked')){
		var enable_page_rendered = $("#enable_page_rendered").val();
	} else {
		var enable_page_rendered = '';
	}
	if($('#enable_current_year').is(':checked')){
		var enable_current_year = $("#enable_current_year").val();
	} else {
		var enable_current_year = '';
	}
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=3&data=system_info&type=system_info&form="+action+'&enable_page_rendered='+enable_page_rendered+'&enable_current_year='+enable_current_year,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				jQuery('.save').prop('disabled', false);
				$('.icon-spinner3').hide();
			} else {
				toastr.success(JSON.result);
				jQuery('.save').prop('disabled', false);
				$('.icon-spinner3').hide();
			}
		}
	});
});

jQuery("#role_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	if($('#contact_role').is(':checked')){
		var contact_role = $("#contact_role").val();
	} else {
		var contact_role = '';
	}
	if($('#edu_role').is(':checked')){
		var edu_role = $("#edu_role").val();
	} else {
		var edu_role = '';
	}
	if($('#work_role').is(':checked')){
		var work_role = $("#work_role").val();
	} else {
		var work_role = '';
	}
	if($('#doc_role').is(':checked')){
		var doc_role = $("#doc_role").val();
	} else {
		var doc_role = '';
	}
	if($('#social_role').is(':checked')){
		var social_role = $("#social_role").val();
	} else {
		var social_role = '';
	}
	if($('#pic_role').is(':checked')){
		var pic_role = $("#pic_role").val();
	} else {
		var pic_role = '';
	}
	if($('#profile_role').is(':checked')){
		var profile_role = $("#profile_role").val();
	} else {
		var profile_role = '';
	}
	if($('#bank_account_role').is(':checked')){
		var bank_account_role = $("#bank_account_role").val();
	} else {
		var bank_account_role = '';
	}
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=4&data=role_info&type=role_info&form="+action+'&employee_manage_own_contact='+contact_role+'&employee_manage_own_qualification='+edu_role+'&employee_manage_own_work_experience='+work_role+'&employee_manage_own_document='+doc_role+'&employee_manage_own_social='+social_role+'&employee_manage_own_picture='+pic_role+'&employee_manage_own_profile='+profile_role+'&employee_manage_own_bank_account='+bank_account_role,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				jQuery('.save').prop('disabled', false);
				$('.icon-spinner3').hide();
			} else {
				toastr.success(JSON.result);
				jQuery('.save').prop('disabled', false);
				$('.icon-spinner3').hide();
			}
		}
	});
});

jQuery("#attendance_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	if($('#enable_attendances').is(':checked')){
		var enable_attendance = $("#enable_attendances").val();
	} else {
		var enable_attendance = '';
	}
	if($('#enable_clock_in_btn').is(':checked')){
		var enable_clock_in_btn = $("#enable_clock_in_btn").val();
	} else {
		var enable_clock_in_btn = '';
	}
	
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=5&data=attendance_info&type=attendance_info&form="+action+"&enable_attendance="+enable_attendance+"&enable_clock_in_btn="+enable_clock_in_btn,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});

jQuery("#email_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	if($('#srole_email_notification').is(':checked')){
		var role_email_notification = $("#srole_email_notification").val();
	} else {
		var role_email_notification = '';
	}
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=5&data=email_info&type=email_info&form="+action+'&enable_email_notification='+role_email_notification,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});

jQuery("#payroll_config").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	if($('#payslip_password_generate').is(':checked')){
		var p_generate_pass = $("#payslip_password_generate").val();
	} else {
		var p_generate_pass = '';
	}
	jQuery.ajax({
		type: "POST",
		url: site_url+'settings/payroll_config/',
		data: obj.serialize()+"&is_ajax=6&data=payroll_config&type=payroll_config&form="+action+"&payslip_password_generate="+p_generate_pass,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});


jQuery("#job_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	if($('#enable_job2').is(':checked')){
		var ejob = $("#enable_job2").val();
	} else {
		var ejob = '';
	}
	$('.icon-spinner3').show();
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=7&data=job_info&type=job_info&form="+action+'&enable_job='+ejob,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});

jQuery("#email_notification_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=8&data=email_notification_info&type=email_notification_info&form="+action,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});

/* Update logo */
$("#logo_info").submit(function(e){
	var fd = new FormData(this);
	var obj = $(this), action = obj.attr('name');
	fd.append("is_ajax", 2);
	fd.append("type", 'logo_info');
	fd.append("data", 'logo_info');
	fd.append("form", action);
	e.preventDefault();
	$('.icon-spinner3').show();
	$('.save').prop('disabled', true);
	$.ajax({
		url: e.target.action,
		type: "POST",
		data:  fd,
		contentType: false,
		cache: false,
		processData:false,
		success: function(JSON)
		{
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.save').prop('disabled', false);
				$('.icon-spinner3').hide();
			} else {
				toastr.success(JSON.result);
				$('#logo_info')[0].reset();
				$('.icon-spinner3').hide();
				$('#u_file').attr("src", JSON.img);
				$('#u_file2').attr("src", JSON.img2);
				$('#favicon1').attr("src", JSON.img3);
				$('.save').prop('disabled', false);
			}
		},
		error: function() 
		{
			toastr.error(JSON.error);
			$('.icon-spinner3').hide();
			$('.save').prop('disabled', false);
		} 	        
   });
});

$("#singin_logo").submit(function(e){
	var fd = new FormData(this);
	$('.icon-spinner3').show();
	var user_id = $('#user_id').val();
	var session_id = $('#session_id').val();
	var obj = $(this), action = obj.attr('name');
	fd.append("is_ajax", 2);
	fd.append("type", 'singin_logo');
	fd.append("data", 'singin_logo');
	fd.append("form", action);
	e.preventDefault();
	$('.save').prop('disabled', true);
	$.ajax({
		url: site_url+'settings/sign_in_logo/',
		type: "POST",
		data:  fd,
		contentType: false,
		cache: false,
		processData:false,
		success: function(JSON)
		{
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				$('#u_file3').attr("src", JSON.img);
				$('.save').prop('disabled', false);
			}
		},
		error: function() 
		{
			toastr.error(JSON.error);
			$('.icon-spinner3').hide();
			$('.save').prop('disabled', false);
		} 	        
   });
});

$("#job_logo").submit(function(e){
	var fd = new FormData(this);
	$('.icon-spinner3').show();
	var obj = $(this), action = obj.attr('name');
	fd.append("is_ajax", 2);
	fd.append("type", 'job_logo');
	fd.append("data", 'job_logo');
	fd.append("form", action);
	e.preventDefault();
	$('.save').prop('disabled', true);
	$.ajax({
		url: site_url+'settings/job_logo/',
		type: "POST",
		data:  fd,
		contentType: false,
		cache: false,
		processData:false,
		success: function(JSON)
		{
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('#u_file4').attr("src", JSON.img);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			}
		},
		error: function() 
		{
			toastr.error(JSON.error);
			$('.icon-spinner3').hide();
			$('.save').prop('disabled', false);
		} 	        
   });
});

$("#payroll_logo").submit(function(e){
	var fd = new FormData(this);
	$('.icon-spinner3').show();
	var obj = $(this), action = obj.attr('name');
	fd.append("is_ajax", 2);
	fd.append("type", 'payroll_logo');
	fd.append("data", 'payroll_logo');
	fd.append("form", action);
	e.preventDefault();
	$('.save').prop('disabled', true);
	$.ajax({
		url: site_url+'settings/payroll_logo/',
		type: "POST",
		data:  fd,
		contentType: false,
		cache: false,
		processData:false,
		success: function(JSON)
		{
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('#u_file5').attr("src", JSON.img);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			}
		},
		error: function() 
		{
			toastr.error(JSON.error);
			$('.icon-spinner3').hide();
			$('.save').prop('disabled', false);
		} 	        
   });
});

jQuery("#animation_effect_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=6&data=animation_effect_info&type=animation_effect_info&form="+action,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});
jQuery("#notification_position_info").submit(function(e){
/*Form Submit*/
e.preventDefault();
	var obj = jQuery(this), action = obj.attr('name');
	jQuery('.save').prop('disabled', true);
	$('.icon-spinner3').show();
	if($('#sclose_btn').is(':checked')){
		var close_btn = $("#sclose_btn").val();
	} else {
		var close_btn = 'false';
	}
	if($('#snotification_bar').is(':checked')){
		var notification_bar = $("#snotification_bar").val();
	} else {
		var notification_bar = 'false';
	}
	jQuery.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=6&data=notification_position_info&type=notification_position_info&form="+action+'&notification_close_btn='+close_btn+'&notification_bar='+notification_bar,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			} else {
				toastr.success(JSON.result);
				$('.icon-spinner3').hide();
				jQuery('.save').prop('disabled', false);
			}
		}
	});
});
	
$(".nav-tabs-link").click(function(){
	var config_id = $(this).data('config');
	var config_block = $(this).data('config-block');
	$('.nav-item-link').removeClass('active-link');
	$('.current-tab').hide();
	$('#'+config_block).show();
	$('#config_'+config_id).addClass('active-link');
});	
});
