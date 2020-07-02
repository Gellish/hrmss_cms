$(document).ready(function() {
	
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' }); 
	
	$('#message').summernote({
	  height: 250,
	  minHeight: null,
	  maxHeight: null,
	  focus: false
	});
	$('.note-children-container').hide();
	
	/* Update logo */
	$("#xin-form").submit(function(e){
	var fd = new FormData(this);
	var obj = $(this), action = obj.attr('name');
	var message = $("#message").code();
	fd.append("is_ajax", 1);
	fd.append("add_type", 'message');
	fd.append("message", message);
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
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
				window.location = base_url+'/sent/';
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
});