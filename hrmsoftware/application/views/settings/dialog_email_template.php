<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['template_id']) && $_GET['data']=='email_template'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_email_template');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("settings/update_template").'/'.$template_id; ?>/" method="post" name="update_template" id="update_template">
  <input type="hidden" name="_method" value="EDIT">
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="name"><?php echo $this->lang->line('xin_template_name');?></label>
          <input class="form-control" name="name" type="text" value="<?php echo $name;?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="subject"><?php echo $this->lang->line('xin_subject');?></label>
          <input class="form-control" name="subject" type="text" value="<?php echo $subject;?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
          <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
            <option value=""></option>
            <option value="1" <?php if($status==1):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_employees_active');?></option>
            <option value="0" <?php if($status==0):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_employees_inactive');?></option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="message"><?php echo $this->lang->line('xin_message');?></label>
          <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_message');?>" name="message" id="summernote"><?php echo $message;?></textarea>
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
							
	var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
		"ajax": {
            url : "<?php echo site_url("settings/email_template_list") ?>",
            type : 'GET'
        },
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}
    });
	
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	$('#summernote').trumbowyg();
	
	/* Edit*/
	$("#update_template").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=2&edit_type=update_template&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('.save').prop('disabled', false);
				} else {
					$('.edit-modal-data').modal('toggle');
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('.save').prop('disabled', false);
				}
			}
		});
	});
});	
</script>
<?php } ?>
