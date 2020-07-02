<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['complaint_id']) && $_GET['data']=='complaint'){
	$assigned_ids = explode(',',$complaint_against);
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_complaint');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("complaints/update").'/'.$complaint_id; ?>" method="post" name="edit_complaint" id="edit_complaint">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $complaint_id;?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="employee"><?php echo $this->lang->line('xin_complaint_from');?></label>
          <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
            <option value=""></option>
            <?php foreach($all_employees as $employee) {?>
            <option value="<?php echo $employee->user_id;?>" <?php if($employee->user_id==$complaint_from):?> selected="selected"<?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
            <?php } ?>
          </select>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title"><?php echo $this->lang->line('xin_complaint_title');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_complaint_title');?>" name="title" type="text" value="<?php echo $title;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="complaint_date"><?php echo $this->lang->line('xin_complaint_date');?></label>
              <input class="form-control d_date" placeholder="<?php echo $this->lang->line('xin_complaint_date');?>" readonly name="complaint_date" type="text" value="<?php echo $complaint_date;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="complaint_against"><?php echo $this->lang->line('xin_complaint_against');?></label>
              <select multiple class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_complaint_employees');?>" name="complaint_against[]">
                <option value=""></option>
                <?php foreach($all_employees as $employee) {?>
                <option value="<?php echo $employee->user_id;?>" <?php if(in_array($employee->user_id,$assigned_ids)):?> selected 
				<?php endif; ?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description"><?php echo $this->lang->line('xin_description');?></label>
          <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="10" id="description2"><?php echo $description;?></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
          <select name="status" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
            <option value="0" <?php if($status=='0'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_pending');?></option>
            <option value="1" <?php if($status=='1'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_accepted');?></option>
            <option value="2" <?php if($status=='2'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_rejected');?></option>
          </select>
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
            url : "<?php echo site_url("complaints/complaint_list") ?>",
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
		$("#edit_complaint").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			var description = $("#description2").code();
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=complaint&form="+action+"&description="+description,
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
<?php } else if(isset($_GET['jd']) && isset($_GET['complaint_id']) && $_GET['data']=='view_complaint'){
	$assigned_ids = explode(',',$complaint_against);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_complaint');?></h4>
</div>
<form class="m-b-1">
  <div class="modal-body">
    <table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
        <tr>
          <th><?php echo $this->lang->line('xin_complaint_from');?></th>
          <td style="display: table-cell;"><?php foreach($all_employees as $employee) {?>
            <?php if($complaint_from==$employee->user_id):?>
            <?php echo $employee->first_name.' '.$employee->last_name;?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_complaint_title');?></th>
          <td style="display: table-cell;"><?php echo $title;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_complaint_date');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->set_date_format($complaint_date);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_complaint_against');?></th>
          <td style="display: table-cell;"><?php foreach($all_employees as $employee) {?>
            <?php if(in_array($employee->user_id,$assigned_ids)):?>
           <?php echo $employee->first_name.' '.$employee->last_name;?><br />
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_description');?></th>
          <td style="display: table-cell;"><?php echo html_entity_decode($description);?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  </div>
</form>
<?php }
?>
