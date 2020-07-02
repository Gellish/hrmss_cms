<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['training_id']) && $_GET['data']=='training'){
	$assigned_ids = explode(',',$employee_id);
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_training');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("training/update").'/'.$training_id; ?>" method="post" name="edit_training" id="edit_training">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $training_id;?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="training_type"><?php echo $this->lang->line('left_training_type');?></label>
              <select class="form-control" name="training_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_training_type');?>">
                <option value=""></option>
                <?php foreach($all_training_types as $training_type) {?>
                <option value="<?php echo $training_type->training_type_id?>" <?php if($training_type_id==$training_type->training_type_id):?> selected="selected" <?php endif;?>><?php echo $training_type->type?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="trainer"><?php echo $this->lang->line('xin_trainer');?></label>
              <select class="form-control" name="trainer" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_trainer');?>">
                <option value=""></option>
                <?php foreach($all_trainers as $trainer) {?>
                <option value="<?php echo $trainer->trainer_id?>" <?php if($trainer_id==$trainer->trainer_id):?> selected="selected" <?php endif;?>><?php echo $trainer->first_name.' '.$trainer->last_name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="training_cost"><?php echo $this->lang->line('xin_training_cost');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_training_cost');?>" name="training_cost" type="text" value="<?php echo $training_cost;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
              <input class="form-control d_date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly="true" name="start_date" type="text" value="<?php echo $start_date;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
              <input class="form-control d_date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly="true" name="end_date" type="text" value="<?php echo $finish_date;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="employee" class="control-label"><?php echo $this->lang->line('xin_employee');?></label>
              <select multiple class="form-control" name="employee_id[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee');?>">
                <option value=""></option>
                <?php foreach($all_employees as $employee) {?>
                <option value="<?php echo $employee->user_id;?>" <?php if(in_array($employee->user_id,$assigned_ids)):?> selected <?php endif; ?>><?php echo $employee->first_name.' '.$employee->last_name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description"><?php echo $this->lang->line('xin_description');?></label>
          <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" id="description2"><?php echo $description;?></textarea>
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
					
		// On page load: datatable
		var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
		"ajax": {
            url : "<?php echo site_url("training/training_list") ?>",
            type : 'GET'
        },
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}
    	});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 
		
		$('#description2').summernote({
		  height: 135,
		  minHeight: null,
		  maxHeight: null,
		  focus: false
		});
		$('.note-children-container').hide();
		$('.d_date').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd',
		yearRange: '1900:' + (new Date().getFullYear() + 10),
		beforeShow: function(input) {
			$(input).datepicker("widget").show();
		}
		});

		/* Edit data */
		$("#edit_training").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			var description = $("#description2").code();
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=training&form="+action+"&description="+description,
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
