$(document).ready(function() {
   var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
		"ajax": {
            url : site_url+"timesheet/date_wise_list/?start_date="+$('#start_date').val()+"&end_date="+$('#end_date').val()+"&user_id="+$('#user_id').val(),
            type : 'GET'
        },
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}
    });
	
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	
	// Month & Year
	$('.attendance_date').datepicker({
		changeMonth: true,
		changeYear: true,
		maxDate: '0',
		dateFormat:'yy-mm-dd',
		altField: "#date_format",
		altFormat: js_date_format,
		yearRange: '1970:' + new Date().getFullYear(),
		beforeShow: function(input) {
			$(input).datepicker("widget").show();
		}
	});
	
	/* attendance datewise report */
	$("#attendance_datewise_report").submit(function(e){
		/*Form Submit*/
		e.preventDefault();
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		var user_id = $('#employee_id').val();
		var xin_table2 = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : site_url+"timesheet/date_wise_list/?start_date="+start_date+"&end_date="+end_date+"&user_id="+user_id,
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
		});
		toastr.success('Request Submit.');
		xin_table2.api().ajax.reload(function(){ }, true);
	});
});