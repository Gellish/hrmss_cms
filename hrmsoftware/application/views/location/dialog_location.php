<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['location_id']) && $_GET['data']=='location'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_location');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("location/update").'/'.$location_id; ?>" method="post" name="edit_location" id="edit_location">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $company_id;?>">
  <input type="hidden" name="ext_name" value="<?php echo $location_name;?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="company_name"><?php echo $this->lang->line('xin_edit_company');?></label>
          <select class="form-control" name="company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_edit_company');?>">
            <option value=""><?php echo $this->lang->line('xin_edit_company');?></option>
            <?php foreach($all_companies as $company) {?>
            <option value="<?php echo $company->company_id;?>" <?php if($company_id==$company->company_id):?> selected <?php endif;?>> <?php echo $company->name;?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="name"><?php echo $this->lang->line('xin_location_name');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_location_name');?>" name="name" type="text" value="<?php echo $location_name;?>">
        </div>
        <div class="form-group">
          <label for="email"><?php echo $this->lang->line('xin_email');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_email');?>" name="email" type="email" value="<?php echo $email;?>">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="phone"><?php echo $this->lang->line('xin_phone');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_phone');?>" name="phone" type="number" value="<?php echo $phone;?>">
            </div>
            <div class="col-md-6">
              <label for="xin_faxn"><?php echo $this->lang->line('xin_faxn');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_faxn');?>" name="fax" type="number" value="<?php echo $fax;?>">
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="email"><?php echo $this->lang->line('xin_view_locationh');?></label>
              <select class="form-control" name="location_head" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_view_locationh');?>">
                <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                <?php foreach($all_employees as $employee) {?>
                <option value="<?php echo $employee->user_id;?>" <?php if($location_head==$employee->user_id):?> selected <?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="website"><?php echo $this->lang->line('xin_view_locationmgr');?></label>
              <select class="form-control" name="location_manager" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_view_locationmgr');?>">
                <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                <?php foreach($all_employees as $employee) {?>
                <option value="<?php echo $employee->user_id;?>" <?php if($location_manager==$employee->user_id):?> selected <?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="address"><?php echo $this->lang->line('xin_address');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_1');?>" name="address_1" type="text" value="<?php echo $address_1;?>">
          <br>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_2');?>" name="address_2" type="text" value="<?php echo $address_2;?>">
          <br>
          <div class="row">
            <div class="col-xs-5">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_city');?>" name="city" type="text" value="<?php echo $city;?>">
            </div>
            <div class="col-xs-4">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_state');?>" name="state" type="text" value="<?php echo $state;?>">
            </div>
            <div class="col-xs-3">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_zipcode');?>" name="zipcode" type="text" value="<?php echo $zipcode;?>">
            </div>
          </div>
          <br>
          <select class="form-control" name="country" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_country');?>">
            <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
            <?php foreach($all_countries as $country) {?>
            <option value="<?php echo $country->country_id;?>" <?php if($countryid==$country->country_id):?> selected <?php endif;?>> <?php echo $country->country_name;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_update');?></button>
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
				url : "<?php echo site_url("location/location_list") ?>",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
    	});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 

		/* Edit data */
		$("#edit_location").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=location&form="+action,
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
<?php } else if(isset($_GET['jd']) && isset($_GET['location_id']) && $_GET['data']=='view_location'){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_location');?></h4>
</div>
<form class="m-b-1">
  <div class="modal-body">
    <table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
        <tr>
          <th><?php echo $this->lang->line('module_company_title');?></th>
          <td style="display: table-cell;"><?php foreach($all_companies as $company) {?>
            <?php if($company_id==$company->company_id):?>
            <?php echo $company->name;?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_location_name');?></th>
          <td style="display: table-cell;"><?php echo $location_name;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_email');?></th>
          <td style="display: table-cell;"><?php echo $email;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_phone');?></th>
          <td style="display: table-cell;"><?php echo $phone;?></span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_faxn');?></th>
          <td style="display: table-cell;"><?php echo $fax;?></span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_view_locationh');?></th>
          <td style="display: table-cell;"><?php foreach($all_employees as $employee) {?>
            <?php if($location_head==$employee->user_id):?>
            <?php echo $employee->first_name.' '.$employee->last_name;?>
            <?php endif;?>
            <?php } ?>
            </span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_view_locationmgr');?></th>
          <td style="display: table-cell;"><?php foreach($all_employees as $employee) {?>
            <?php if($location_manager==$employee->user_id):?>
            <?php echo $employee->first_name.' '.$employee->last_name;?>
            <?php endif;?>
            <?php } ?>
            </span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_address');?></th>
          <td style="display: table-cell;"><?php echo $address_1;?></span></td>
        </tr>
        <?php if($address_2!='') { ?>
        <tr>
          <th>&nbsp;</th>
          <td style="display: table-cell;"><?php echo $address_2;?></span></td>
        </tr>
        <?php } ?>
        <tr>
          <th><?php echo $this->lang->line('xin_city');?></th>
          <td style="display: table-cell;"><?php echo $city;?></span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_state');?></th>
          <td style="display: table-cell;"><?php echo $state;?></span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_zipcode');?></th>
          <td style="display: table-cell;"><?php echo $zipcode;?></span></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_country');?></th>
          <td style="display: table-cell;"><?php foreach($all_countries as $country) {?>
            <?php if($countryid==$country->country_id):?>
            <?php echo $country->country_name;?>
            <?php endif;?>
            <?php } ?>
            </span></td>
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
