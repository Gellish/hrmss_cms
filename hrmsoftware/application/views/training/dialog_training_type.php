<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['training_type_id']) && $_GET['data']=='training'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_training_type');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("training_type/update").'/'.$training_type_id; ?>" method="post" name="edit_type" id="edit_type">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $training_type_id;?>">
  <div class="modal-body">
    <div class="form-group">
      <label for="type_name" class="form-control-label"><?php echo $this->lang->line('left_training_type');?></label>
      <input type="text" class="form-control" name="type_name" value="<?php echo $type?>" placeholder="<?php echo $this->lang->line('left_training_type');?>">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
  </div>
</form>
<script type="text/javascript">
 $(document).ready(function(){
					
		// On page load: datatable
		var xin_table = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : "<?php echo site_url("training_type/type_list") ?>",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
    	});
		/* Edit data */
		$("#edit_type").submit(function(e){
		/*Form Submit*/
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=2&edit_type=training&edit=1&form="+action,
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
<?php }
?>
