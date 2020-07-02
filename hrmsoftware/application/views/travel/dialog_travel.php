<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['travel_id']) && $_GET['data']=='travel'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_travel');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("travel/update").'/'.$travel_id; ?>" method="post" name="edit_travel" id="edit_travel">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $travel_id;?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="employee_id"><?php echo $this->lang->line('dashboard_single_employee');?></label>
          <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
            <option value=""></option>
            <?php foreach($all_employees as $employee) {?>
            <option value="<?php echo $employee->user_id;?>" <?php if($employee->user_id==$employee_id):?> selected="selected"<?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
            <?php } ?>
          </select>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
              <input class="form-control d_date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" value="<?php echo $start_date;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
              <input class="form-control d_date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" value="<?php echo $end_date;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="visit_purpose"><?php echo $this->lang->line('xin_visit_purpose');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_visit_purpose');?>" name="visit_purpose" type="text" value="<?php echo $visit_purpose;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="visit_place"><?php echo $this->lang->line('xin_visit_place');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_visit_place');?>" name="visit_place" type="text" value="<?php echo $visit_place;?>">
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
      <div class="col-md-3">
        <div class="form-group">
          <label for="travel_mode"><?php echo $this->lang->line('xin_travel_mode');?></label>
          <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_travel_mode');?>" name="travel_mode">
            <option value="1" <?php if(1==$travel_mode):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_by_bus');?></option>
            <option value="2" <?php if(2==$travel_mode):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_by_train');?></option>
            <option value="3" <?php if(3==$travel_mode):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_by_plane');?></option>
            <option value="4" <?php if(4==$travel_mode):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_by_taxi');?></option>
            <option value="5" <?php if(5==$travel_mode):?> selected="selected"<?php endif;?>><?php echo $this->lang->line('xin_by_rental_car');?></option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="arrangement_type"><?php echo $this->lang->line('xin_arragement_type');?></label>
          <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_arragement_type');?>" name="arrangement_type">
            <?php foreach($travel_arrangement_types as $travel_arr_type) {?>
            <option value="<?php echo $travel_arr_type->arrangement_type_id;?>" <?php if($travel_arr_type->arrangement_type_id==$arrangement_type):?> selected="selected"<?php endif;?>> <?php echo $travel_arr_type->type;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="expected_budget"><?php echo $this->lang->line('xin_expected_travel_budget');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_expected_travel_budget');?>" name="expected_budget" type="text" value="<?php echo $expected_budget;?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="actual_budget"><?php echo $this->lang->line('xin_actual_travel_budget');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_actual_travel_budget');?>" name="actual_budget" type="text" value="<?php echo $actual_budget;?>">
        </div>
      </div>
      <div class="col-md-3">
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
            url : "<?php echo site_url("travel/travel_list") ?>",
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
		$("#edit_travel").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			var description = $("#description2").code();
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=travel&form="+action+"&description="+description,
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
<?php } else if(isset($_GET['jd']) && isset($_GET['travel_id']) && $_GET['data']=='view_travel'){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_travel');?></h4>
</div>
<form class="m-b-1">
  <div class="modal-body">
    <table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
        <tr>
          <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
          <td style="display: table-cell;"><?php foreach($all_employees as $employee) {?>
            <?php if($employee_id==$employee->user_id):?>
            <?php echo $employee->first_name.' '.$employee->last_name;?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_start_date');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->set_date_format($start_date);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_end_date');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->set_date_format($end_date);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_visit_purpose');?></th>
          <td style="display: table-cell;"><?php echo $visit_purpose;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_visit_place');?></th>
          <td style="display: table-cell;"><?php echo $visit_place;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_travel_mode');?></th>
          <td style="display: table-cell;"><?php if(1==$travel_mode): $tmode = $this->lang->line('xin_by_bus');?>
            <?php endif;?>
            <?php if(2==$travel_mode): $tmode = $this->lang->line('xin_by_train');?>
            <?php endif;?>
            <?php if(3==$travel_mode): $tmode = $this->lang->line('xin_by_plane');?>
            <?php endif;?>
            <?php if(4==$travel_mode): $tmode = $this->lang->line('xin_by_taxi');?>
            <?php endif;?>
            <?php if(5==$travel_mode): $tmode = $this->lang->line('xin_by_rental_car');?>
            <?php endif;?>
            <?php echo $tmode;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_arragement_type');?></th>
          <td style="display: table-cell;"><?php foreach($travel_arrangement_types as $travel_arr_type) {?>
            <?php if($arrangement_type==$travel_arr_type->arrangement_type_id):?>
            <?php echo $travel_arr_type->type;?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_expected_travel_budget');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->currency_sign($expected_budget);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_actual_travel_budget');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->currency_sign($expected_budget);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
          <td style="display: table-cell;"><?php if(0==$status): $tstatus = $this->lang->line('xin_pending');?>
            <?php endif;?>
            <?php if(1==$status): $tstatus = $this->lang->line('xin_accepted');?>
            <?php endif;?>
            <?php if(2==$status): $tstatus = $this->lang->line('xin_rejected');?>
            <?php endif;?>
            <?php echo $tstatus;?></td>
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
