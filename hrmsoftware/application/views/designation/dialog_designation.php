<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['designation_id']) && $_GET['data']=='designation'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_designation_edit');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("designation/update").'/'.$designation_id; ?>" method="post" name="edit_designation" id="edit_designation">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $designation_id;?>">
  <input type="hidden" name="ext_name" value="<?php echo $designation_name;?>">
  <div class="modal-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <h6><?php echo $this->lang->line('xin_department');?></h6>
          <select name="department_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_department');?>...">
            <option value=""></option>
            <?php foreach($all_departments as $deparment) {?>
            <option value="<?php echo $deparment->department_id?>" <?php if($deparment->department_id==$department_id) {?> selected="selected" <?php } ?>><?php echo $deparment->department_name?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <h6><?php echo $this->lang->line('xin_designation');?></h6>
        <input type="text" class="form-control" name="designation_name" value="<?php echo $designation_name;?>">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
  </div>
</form>
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/select2/dist/css/select2.min.css">
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
					
		// On page load: datatable
		var xin_table = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : "<?php echo site_url("designation/designation_list") ?>",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
    	});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 

		/* Edit data */
		$("#edit_designation").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=designation&form="+action,
				cache: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('.save').prop('disabled', false);
					} else {
						xin_table.api().ajax.reload(function(){ 
							toastr.success(JSON.result);
						}, true);
						$('.edit-modal-data').modal('toggle');
						$('.save').prop('disabled', false);
					}
				}
			});
		});
	});	
  </script>
<?php }
?>
