<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['file_id']) && $_GET['data']=='file_manager'){
?>
<?php $ext = pathinfo($file_name, PATHINFO_EXTENSION);?>
<?php $file = basename($file_name, '.'.$ext);?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_file_name');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("files/update").'/'.$file_id; ?>" method="post" name="edit_file" id="edit_file">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="file_id" value="<?php echo $file_id;?>">
  <input type="hidden" name="ext_name" value="<?php echo $ext;?>">
  <input type="hidden" name="did" id="did" value="<?php echo $department_id;?>" />
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="file_name"><?php echo $this->lang->line('xin_new_file_name');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_new_file_name');?>" name="file_name" type="text" value="<?php echo $file;?>">
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="oldfname" value="<?php echo $file_name;?>">
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
  </div>
</form>
<script type="text/javascript">
 $(document).ready(function(){
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	
		
		/* Add data */ /*Form Submit*/
		$("#edit_file").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=file&form="+action,
				cache: false,
				success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('.save').prop('disabled', false);
				} else {
					// On page load: datatable
					var xin_table_files = $('#xin_table_files').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("files/files_list") ?>/dId/"+$('#did').val(),
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
					});
					xin_table_files.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('.payroll_template_modal').modal('toggle');
					$('.save').prop('disabled', false);
				}
			}
		});
	});
});	
</script>
<?php }
?>
