$(document).ready(function() {
   var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
		"ajax": {
            url : site_url+"employee/performance/appraisal_list/",
            type : 'GET'
        },
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}
    });
	
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' }); 	
	
	// view and get data
	$('#view-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var p_appraisal_id = button.data('p_appraisal_id');
		var modal = $(this);
	$.ajax({
		url: site_url+'performance_appraisal/read/',
		type: "GET",
		data: 'jd=1&is_ajax=4&mode=modal&data=view_appraisal&type=view_appraisal&performance_appraisal_id='+p_appraisal_id,
		success: function (response) {
			if(response) {
				$("#ajax_modal_view").html(response);
			}
		}
	});
	});
});