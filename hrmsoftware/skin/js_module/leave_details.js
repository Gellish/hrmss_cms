$(document).ready(function() {
	
$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
$('[data-plugin="select_hrm"]').select2({ width:'100%' });
$('#remarks').summernote({
  height: 120,
  minHeight: null,
  maxHeight: null,
  focus: false
});
$('.note-children-container').hide();
	
/* Add data */ /*Form Submit*/
$("#update_status").submit(function(e){
e.preventDefault();
	var obj = $(this), action = obj.attr('name');
	var remarks = $("#remarks").code();
	$.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=1&update_type=leave&form="+action+"&remarks="+remarks,
		cache: false,
		success: function (JSON) {
			if (JSON.error != '') {
				toastr.error(JSON.error);
			} else {
				toastr.success(JSON.result);
			}
		}
	});
});
});