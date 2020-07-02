<?php $session = $this->session->userdata('username'); ?>
<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']); ?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<div class="modal fade delete-modal animated <?php echo $system[0]->animation_effect_modal;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <strong class="modal-title">Are you sure you want to delete this record?</strong> </div>
      <div class="alert alert-danger alert-dismissible fade in m-b-0" role="alert"> <strong>Record deleted can't be restored!!!</strong> </div>
      <div class="modal-footer">
        <form id="delete_record" name="delete_record" role="form" action="" method="post">
          <input name="_method" type="hidden" value="DELETE">
          <input name="_token" type="hidden" value="">
          <input name="token_type" id="token_type" type="hidden" value="">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade edit-modal-data animated <?php echo $system[0]->animation_effect_modal;?>" id="edit-modal-data" tabindex="-1" role="dialog" aria-labelledby="edit-modal-data" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="ajax_modal"></div>
  </div>
</div>
<div class="modal fade view-modal-data animated <?php echo $system[0]->animation_effect_modal;?>" id="view-modal-data" tabindex="-1" role="dialog" aria-labelledby="view-modal-data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_modal_view"></div>
  </div>
</div>
<div class="modal fade payroll_template_modal default-modal animated <?php echo $system[0]->animation_effect_modal;?>" id="payroll_template_modal" tabindex="-1" role="dialog" aria-labelledby="detail-modal-data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_modal_payroll"></div>
  </div>
</div>
<div class="modal fade hourlywages_template_modal default-modal animated <?php echo $system[0]->animation_effect_modal;?>" id="hourlywages_template_modal" tabindex="-1" role="dialog" aria-labelledby="detail-modal-data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_modal_hourlywages"></div>
  </div>
</div>
<div class="modal fade detail_modal_data default-modal animated <?php echo $system[0]->animation_effect_modal;?>" id="detail_modal_data" tabindex="-1" role="dialog" aria-labelledby="detail-modal-data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_modal_details"></div>
  </div>
</div>
<div class="modal fade emo_monthly_pay animated <?php echo $system[0]->animation_effect_modal;?>" id="emo_monthly_pay" tabindex="-1" role="dialog" aria-labelledby="emo_monthly_pay" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="emo_monthly_pay_aj"></div>
  </div>
</div>
<div class="modal fade emo_hourly_pay animated <?php echo $system[0]->animation_effect_modal;?>" id="emo_hourly_pay" tabindex="-1" role="dialog" aria-labelledby="emo_hourly_pay" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="emo_hourly_pay_aj"></div>
  </div>
</div>
<div class="modal fade delete-modal-file animated <?php echo $system[0]->animation_effect_modal;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <strong class="modal-title">Are you sure you want to delete this record?</strong> </div>
      <div class="alert alert-danger alert-dismissible fade in m-b-0" role="alert"> <strong>Record deleted can't be restored!!!</strong> </div>
      <div class="modal-footer">
        <form id="delete_record_f" name="delete_record_f" role="form" action="" method="post">
          <input name="_method" type="hidden" value="DELETE">
          <input name="_token_del_file" type="hidden" value="">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade add-modal-data animated <?php echo $system[0]->animation_effect_modal;?>" id="add-modal-data" tabindex="-1" role="dialog" aria-labelledby="add-modal-data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="add_ajax_modal"></div>
  </div>
</div>
<div class="modal fade delete-modal-task animated <?php echo $system[0]->animation_effect_modal;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <strong class="modal-title">Are you sure you want to delete this record?</strong> </div>
      <div class="alert alert-danger alert-dismissible fade in m-b-0" role="alert"> <strong>Record deleted can't be restored!!!</strong> </div>
      <div class="modal-footer">
        <form id="delete_record_t" name="delete_record_t" role="form" action="" method="post">
          <input name="_method" type="hidden" value="DELETE">
          <input name="_token_del_file" type="hidden" value="">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="cd-panel from-right" id="cd-panel">
</div> <!-- cd-panel -->
<?php $logo_second = base_url().'uploads/logo/'.$company[0]->logo_second;?>
<?php $logo = base_url().'uploads/logo/'.$company[0]->logo;?>
<style type="text/css">
.skin-4 .site-header .navbar-brand .logo {
    background: url(<?php echo $logo?>) no-repeat;
}
.skin-3 .site-header .navbar-brand .logo {
    background: url(<?php echo $logo?>) no-repeat;
}
.site-header .navbar-brand .logo {
    background: url(<?php echo $logo_second?>) no-repeat;
}
</style>

<!-- Vendor JS -->
<?php if($user[0]->user_role_id=='1'){?>
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/morris/morris.css">
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/chartjs/Chart.bundle.min.js"></script> 
<?php } ?>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jquery/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/tether/js/tether.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/detectmobilebrowser/detectmobilebrowser.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jscrollpane/jquery.mousewheel.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jscrollpane/mwheelIntent.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jscrollpane/jquery.jscrollpane.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/waves/waves.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/chartist/chartist.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/switchery/dist/switchery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/select2/dist/js/select2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/js/dataTables.bootstrap4.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/pdfmake/build/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/pdfmake/build/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Buttons/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/DataTables/Buttons/js/buttons.colVis.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/toastr/toastr.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/raphael/raphael.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/morris/morris.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/summernote/summernote.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jquery-ui/jquery-ui.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/clockpicker/dist/jquery-clockpicker.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/Trumbowyg/dist/trumbowyg.min.js"></script> 
<!-- JS --> 

<!--<link rel="stylesheet" href="http://plugins.krajee.com/assets/86220c49/css/fileinput.min.css">-->
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/switchery/dist/switchery.min.css">
<script type="text/javascript" src="<?php echo base_url();?>skin/js/app.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/js/demo.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/kendo/kendo.all.min.js"></script> 
<script type="text/javascript" src="http://trickycode.net/money/theme/js/pdf/jspdf.debug.js"></script>
<script src="<?php echo base_url();?>skin/js/main.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>skin/js/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>skin/js/reset.css">
<script type="text/javascript">
$(document).ready(function(){
	toastr.options.closeButton = <?php echo $system[0]->notification_close_btn;?>;
	toastr.options.progressBar = <?php echo $system[0]->notification_bar;?>;
	toastr.options.timeOut = 3000;
	toastr.options.preventDuplicates = true;
	toastr.options.positionClass = "<?php echo $system[0]->notification_position;?>";
	$(".add-new-form").click(function(){
		$(".add-form").slideToggle('slow');
	});

	$('.date').datepicker({
	changeMonth: true,
	changeYear: true,
	dateFormat:'yy-mm-dd',
	yearRange: '1900:' + (new Date().getFullYear() + 15),
	beforeShow: function(input) {
		$(input).datepicker("widget").show();
	}
	});
});	
</script> 
<style type="text/css">

</style>
<script type="text/javascript">var user_role = '<?php echo $user[0]->user_role_id;?>';</script>
<script type="text/javascript">var js_date_format = '<?php echo $this->Xin_model->set_date_format_js();?>';</script> 
<script type="text/javascript">var site_url = '<?php echo base_url(); ?>';</script> 
<script type="text/javascript">var base_url = '<?php echo base_url().$this->router->fetch_class(); ?>';</script> 
<script type="text/javascript" src="<?php echo base_url().'skin/js_module/'.$path_url.'.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'skin/js_module/set_clocking.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'skin/js_module/custom.js'; ?>"></script>
<?php if($this->router->fetch_method() =='task_details' || $this->router->fetch_class() =='project'){?>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<?php } ?>
<?php if($this->router->fetch_method() =='task_details' || $this->router->fetch_class() =='project'){?>
<script type="text/javascript">
$(document).ready(function(){	
	$("#range_grid").ionRangeSlider({
		type: "single",
		min: 0,
		max: 100,
		from: '<?php echo $progress;?>',
		grid: true,
		force_edges: true,
		onChange: function (data) {
			$('#progres_val').val(data.from);
		}
	});
});
</script>
<?php } ?>
<?php if($this->router->fetch_class() =='roles') { ?>
	<?php $this->load->view('roles/role_values');?>
<?php } ?>
</body></html>