$(document).ready(function(){
	
	/* Clock In */
	$("#set_clocking_hd").submit(function(e){
		
		e.preventDefault();
		var clock_state = '';
		var obj = $(this), action = obj.attr('name');
		$.ajax({
			type: "POST",
			url: site_url+'timesheet/set_clocking/',
			data: obj.serialize()+"&is_ajax=1&type=set_clocking&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
				} else {
					toastr.success(JSON.result);
					window.location = '';
				}
			}
		});
	});
});