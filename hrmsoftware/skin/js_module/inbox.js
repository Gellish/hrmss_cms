$(document).ready(function() {
   var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
		"ajax": {
            url : site_url+"mail/inbox_list/",
            type : 'GET'
        },
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();
		$("#xin_table thead").remove();     
		}
    });
	
	$("#check_all_messages").change(function(){
	
	if (! $('input:checkbox').is('checked')) {
	  $('input:checkbox').prop('checked',true);
	} else {
	  $('input:checkbox').prop('checked', false);
	}       
	});
	
	$("#xin-form-mail").submit(function(e){
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=1&add_type=delete_mail&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('.save').prop('disabled', false);
				} else {
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('.save').prop('disabled', false);
				}
			}
		});
	});
	$(".refresh-messages").click(function () {
		xin_table.api().ajax.reload(function(){
		}, true);
	});	
});

$( document ).on( "click", ".make-starred", function() {
var message_id = $(this).data('message-id');
$.ajax({
type: "GET",
url: site_url+"mail/make_starred/"+message_id,
	success: function (JSON) {
		var xin_table2 = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : site_url+"mail/inbox_list/",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();
			$("#xin_table thead").remove();   
			}
		});
		xin_table2.api().ajax.reload(function(){ 
		}, true);
	}
});
});	

$( document ).on( "click", ".make-unstarred", function() {
var message_id = $(this).data('message-id');
$.ajax({
type: "GET",
url: site_url+"mail/make_unstarred/"+message_id,
	success: function (JSON) {
		var xin_table3 = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : site_url+"mail/inbox_list/",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();   
			$("#xin_table thead").remove();
			}
		});
		xin_table3.api().ajax.reload(function(){ 
		}, true);
	}
});
});

$(document).ready(function() {

	//Enable check and uncheck checkboxes
	$(".checkbox-toggle").click(function () {
		var clicks = $(this).data('clicks');
		if (clicks) {
			//Uncheck all checkboxes
			$(".mailbox-messages input[type='checkbox']").prop('checked',false);
			$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
		} else {
			//Check all checkboxes
			$(".mailbox-messages input[type='checkbox']").prop('checked',true);
			$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
		}
		$(this).data("clicks", !clicks);
	});
});