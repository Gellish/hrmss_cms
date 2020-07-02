<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['company_id']) && $_GET['data']=='company'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><i class="icon-pencil7"></i> <?php echo $this->lang->line('xin_edit_company');?></h4>
</div>
<form class="m-b-1" action="<?php echo site_url("company/update").'/'.$company_id; ?>" method="post" name="edit_company" id="edit_company">
  <input type="hidden" name="_method" value="EDIT">
  <input type="hidden" name="_token" value="<?php echo $_GET['company_id'];?>">
  <input type="hidden" name="ext_name" value="<?php echo $name;?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="company_name"><?php echo $this->lang->line('xin_company_name');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_name');?>" name="name" type="text" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="email"><?php echo $this->lang->line('xin_company_type');?></label>
              <select class="form-control" name="company_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_company_type');?>">
                <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                <?php foreach($get_company_types as $ctype) {?>
                <option value="<?php echo $ctype->type_id;?>" <?php if($type_id==$ctype->type_id){?> selected="selected" <?php } ?>> <?php echo $ctype->name;?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="trading_name"><?php echo $this->lang->line('xin_company_trading');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_trading');?>" name="trading_name" type="text" value="<?php echo $trading_name;?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="registration_no"><?php echo $this->lang->line('xin_company_registration');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_registration');?>" name="registration_no" type="text" value="<?php echo $registration_no;?>">
            </div>
            <div class="col-md-6">
              <label for="contact_number"><?php echo $this->lang->line('xin_contact_number');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_contact_number');?>" name="contact_number" type="number" value="<?php echo $contact_number;?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="email"><?php echo $this->lang->line('xin_email');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_email');?>" name="email" type="email" value="<?php echo $email;?>">
            </div>
            <div class="col-md-6">
              <label for="website"><?php echo $this->lang->line('xin_website');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_website_url');?>" name="website" value="<?php echo $website_url;?>" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <h6><?php echo $this->lang->line('xin_company_logo');?></h6>
         	 <span class="btn btn-primary btn-file">
                Browse <input type="file" name="logo" id="logo">
              </span>
          <?php if($logo!='' || $logo!='no-file'){?>
          <div class="avatar box-48 mr-0-5"> <img class="b-a-radius-circle" src="<?php echo site_url();?>uploads/company/<?php echo $logo;?>" alt=""> </div>
          <?php } ?>
          <br>
          <small><?php echo $this->lang->line('xin_company_file_type');?></small> </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="xin_gtax"><?php echo $this->lang->line('xin_gtax');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_gtax');?>" name="xin_gtax" value="<?php echo $government_tax;?>" type="text">
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
            <option value="<?php echo $country->country_id;?>" <?php if($countryid==$country->country_id):?> selected="selected"<?php endif;?>> <?php echo $country->country_name;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_update');?></button>
  </div>
</form>
<script type="text/javascript">
 $(document).ready(function(){
					
		// On page load: datatable
		var xin_table = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : "<?php echo site_url("company/company_list") ?>",
				type : 'GET'
			},
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
    	});
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 

		/* Edit data */
		$("#edit_company").submit(function(e){
			var fd = new FormData(this);
			var obj = $(this), action = obj.attr('name');
			fd.append("is_ajax", 2);
			fd.append("edit_type", 'company');
			fd.append("form", action);
			e.preventDefault();
			$('.save').prop('disabled', true);
			$.ajax({
				url: e.target.action,
				type: "POST",
				data:  fd,
				contentType: false,
				cache: false,
				processData:false,
				success: function(JSON)
				{
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
				},
				error: function() 
				{
					toastr.error(JSON.error);
					$('.save').prop('disabled', false);
				} 	        
		   });
		});
	});	
  </script>
<?php } else if(isset($_GET['jd']) && $_GET['data']=='view_company' && isset($_GET['company_id']) ){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><i class="icon-eye4"></i> <?php echo $this->lang->line('xin_view_company');?></h4>
</div>
<form class="m-b-1">
  <div class="modal-body">
  <table class="footable-details table table-striped table-hover toggle-circle">
    <tbody>
      <tr>
        <th><?php echo $this->lang->line('xin_company_name');?></th>
        <td style="display: table-cell;"><?php echo $name;?></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_company_type');?></th>
        <td style="display: table-cell;"><?php foreach($get_company_types as $ctype) {?>
          <?php if($type_id==$ctype->type_id){?>
          <?php echo $ctype->name;?>
          <?php } } ?></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_company_trading');?></th>
        <td style="display: table-cell;"><?php echo $trading_name;?></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_company_registration');?></th>
        <td style="display: table-cell;"><?php echo $registration_no;?></span></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_contact_number');?></th>
        <td style="display: table-cell;"><?php echo $contact_number;?></span></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_email');?></th>
        <td style="display: table-cell;"><?php echo $email;?></span></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_website');?></th>
        <td style="display: table-cell;"><?php echo $website_url;?></span></td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_gtax');?></th>
        <td style="display: table-cell;"><?php echo $government_tax;?></span></td>
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
          </td>
      </tr>
      <tr>
        <th><?php echo $this->lang->line('xin_company_logo');?></th>
        <td style="display: table-cell;"><?php if($logo!='' || $logo!='no-file'){?>
          <div class="avatar box-48 mr-0-5"> <img src="<?php echo site_url();?>uploads/company/<?php echo $logo;?>" alt=""></a> </div>
          <?php } ?></td>
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
