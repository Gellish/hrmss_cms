<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['advance_salary_id']) && $_GET['data']=='advance_salary'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_advance_salary');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("payroll/update_advance_salary").'/'.$advance_salary_id; ?>" method="post" name="update_advance_salary" id="update_advance_salary" autocomplete="off">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $advance_salary_id;?>">
  <input type="hidden" name="ext_name" value="<?php echo $advance_salary_id;?>">
  <div class="modal-body">
    
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="employee"><?php echo $this->lang->line('dashboard_single_employee');?></label>
              <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                <option value=""></option>
                <?php foreach($all_employees as $employee) {?>
                <option value="<?php echo $employee->user_id;?>" <?php if($employee->user_id==$employee_id):?> selected="selected"<?php endif; ?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                <?php } ?>
              </select>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <label for="month_year"><?php echo $this->lang->line('xin_award_month_year');?></label>
              <input class="form-control d_month_year" placeholder="<?php echo $this->lang->line('xin_award_month_year');?>" readonly name="month_year" type="text" value="<?php echo $month_year;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="end_date"><?php echo $this->lang->line('xin_amount');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="amount" type="text" value="<?php echo $advance_amount;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="edu_role"><?php echo $this->lang->line('xin_one_time_deduct');?></label>
            	<select name="one_time_deduct" class="select2 m_one_time_deduct" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_one_time_deduct');?>">
                
                <option value="1" <?php if($one_time_deduct==1):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_yes');?></option><option value="0" <?php if($one_time_deduct==0):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_no');?></option>
              </select>            
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="edu_role"><?php echo $this->lang->line('xin_emi_salary');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_monthly_installment');?>" name="monthly_installment" type="text" id="m_monthly_installment" <?php if($one_time_deduct==1):?>disabled="disabled"<?php endif;?> value="<?php echo $monthly_installment;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="is_publish"><?php echo $this->lang->line('dashboard_xin_status');?></label>
              <select name="status" class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_status');?>">
                <option value="0" <?php if($status==0):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_pending');?></option>
                <option value="1" <?php if($status==1):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_accepted');?></option>
                <option value="2" <?php if($status==2):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_rejected');?></option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description"><?php echo $this->lang->line('xin_reason');?></label>
              <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_reason');?>" name="reason" cols="30" rows="15" id="reason2"><?php echo $reason;?></textarea>
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
					
		$('#reason2').summernote({
		  height: 137,
		  minHeight: null,
		  maxHeight: null,
		  focus: false
		});
		$('.note-children-container').hide();
		
		$(".m_one_time_deduct").change(function(){
			if($(this).val()==1){
				$('#m_monthly_installment').attr('disabled',true);
				$('#monthly_installment').val(0);
			} else {
				$('#m_monthly_installment').attr('disabled',false);
			}
		});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });
		
		// Award Month & Year
		$('.d_month_year').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat:'yy-mm',
		yearRange: '1900:' + (new Date().getFullYear() + 15),
		beforeShow: function(input) {
			$(input).datepicker("widget").addClass('hide-calendar');
		},
		onClose: function(dateText, inst) {
			var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker('setDate', new Date(year, month, 1));
			$(this).datepicker('widget').removeClass('hide-calendar');
			$(this).datepicker('widget').hide();
		}
			
		}); 

		/* Edit data */
		$("#update_advance_salary").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			var reason = $("#reason2").code();
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=advance_salary&form="+action+"&reason="+reason,
				cache: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('.save').prop('disabled', false);
					} else {
						// On page load: datatable
						var xin_table = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("payroll/advance_salary_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
						});
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
<?php } else if(isset($_GET['jd']) && isset($_GET['advance_salary_id']) && $_GET['data']=='view_advance_salary'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_advance_salary');?></h4>
</div>
  <div class="modal-body">
  <div class="table-responsive" data-pattern="priority-columns">
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
          <th><?php echo $this->lang->line('xin_award_month_year');?></th>
          <td style="display: table-cell;"><?php echo $month_year;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_amount');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->currency_sign($advance_amount);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_one_time_deduct');?></th>
          <td style="display: table-cell;"><?php if($one_time_deduct==1): echo $onetime = $this->lang->line('xin_yes'); else: echo $onetime = $this->lang->line('xin_no'); endif;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_emi_salary');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->currency_sign($monthly_installment);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
          <td style="display: table-cell;"><?php if($status==0): echo $status = $this->lang->line('xin_pending'); elseif($status==1): echo $status = $this->lang->line('xin_accepted'); else: echo $status = $this->lang->line('xin_rejected'); endif;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_created_at');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->set_date_format($created_at);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_reason');?></th>
          <td style="display: table-cell;"><?php echo html_entity_decode($reason);?></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  </div>
<?php } else if(isset($_GET['jd']) && isset($_GET['employee_id']) && $_GET['data']=='view_advance_salary_report'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_advance_salary_report');?></h4>
</div>
  <div class="modal-body">
    <div class="table-responsive" data-pattern="priority-columns">
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
          <th><?php echo $this->lang->line('xin_total_amount');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->currency_sign($advance_amount);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_total_paid_amount');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->currency_sign($total_paid);?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_one_time_deduct');?></th>
          <td style="display: table-cell;">
		  <?php
			$remainig_amount = $advance_amount - $total_paid;
			$ramount = $this->Xin_model->currency_sign($remainig_amount);
			?>
		  <?php echo $ramount;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
          <td style="display: table-cell;">
			<?php
            if($advance_amount == $total_paid){
            	$all_paid = '<span class="tag tag-success">'.$this->lang->line('xin_all_paid').'</span>';
            } else {
           		$all_paid = '<span class="tag tag-warning">'.$this->lang->line('xin_remaining').'</span>';
            }
            ?>
		  <?php echo $all_paid;?></td>
        </tr>
        <tr>
          <th colspan="2" style="text-align:center;"><?php echo $this->lang->line('xin_rquested_date_details');?></th>
        </tr>        
      </tbody>
    </table>
    </div>
    <div class="table-responsive" data-pattern="priority-columns">
    <table class="footable-details table table-striped table-hover toggle-circle">
    	<tr>
          <th><?php echo $this->lang->line('xin_amount');?></th>
          <th><?php echo $this->lang->line('xin_award_month_year');?></th>
          <th><?php echo $this->lang->line('xin_one_time_deduct');?></th>
          <th><?php echo $this->lang->line('xin_emi_salary');?></th>
          <th><?php echo $this->lang->line('xin_created_at');?></th>
        </tr>
        <?php $requested_date = $this->Payroll_model->requested_date_details($employee_id);?>
        <?php foreach($requested_date->result() as $r):?>
        <?php
		$d = explode('-',$r->month_year);
		$get_month = date('F', mktime(0, 0, 0, $d[1], 10));
		$month_year = $get_month.', '.$d[0];
		// get onetime deduction value
		if($r->one_time_deduct==1): $onetime = $this->lang->line('xin_yes'); else: $onetime = $this->lang->line('xin_no'); endif;
		?>
        <tr>
          <td><?php echo $this->Xin_model->currency_sign($r->advance_amount)?></td>
          <td><?php echo $month_year;?></td>
          <td><?php echo $onetime;?></td>
          <td><?php echo $this->Xin_model->currency_sign($r->monthly_installment);?></td>
          <td><?php echo '<i class="fa fa-calendar position-left"></i> '.$this->Xin_model->set_date_format($r->created_at);?></td>
        </tr>
        <?php endforeach;?>
    </table>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  </div>
<?php }
?>
