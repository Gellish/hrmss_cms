$(document).ready(function() {
   var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
		"ajax": {
            url : site_url+"employee/travels/travel_list/",
            type : 'GET'
        },
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}
    });	
	$('.view-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var travel_id = button.data('travel_id');
		var modal = $(this);
	$.ajax({
		url : site_url+"travel/read/",
		type: "GET",
		data: 'jd=1&is_ajax=1&mode=view_modal&data=view_travel&travel_id='+travel_id,
		success: function (response) {
			if(response) {
				$("#ajax_modal_view").html(response);
			}
		}
		});
	});
});