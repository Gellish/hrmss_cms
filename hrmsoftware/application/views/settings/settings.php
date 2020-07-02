<?php
/* Settings view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $file_setting = $this->Xin_model->read_file_setting_info(1);?>

<div class="row m-b-1">
  <div class="col-md-3">
    <div class="box bg-white">
      <ul class="nav nav-4">
        <li class="nav-item nav-item-link"> <span class="nav-link" href="#setting" data-config="0" data-toggle="tab" aria-expanded="true"> <strong><?php echo $this->lang->line('xin_system_settings');?></strong> </span> </li>
        <li class="nav-item nav-item-link active-link" id="config_1"> <a class="nav-link nav-tabs-link" href="#general" data-config="1" data-config-block="general" data-toggle="tab" aria-expanded="true"> <i class="fa fa-cog"></i> <?php echo $this->lang->line('xin_general');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_2"> <a class="nav-link nav-tabs-link" href="#company_logo" data-config="2" data-config-block="company_logo" data-toggle="tab" aria-expanded="true"> <i class="fa fa-camera"></i> <?php echo $this->lang->line('xin_logos');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_3"> <a class="nav-link nav-tabs-link" href="#system" data-config="3" data-config-block="system" data-toggle="tab" aria-expanded="true"> <i class="fa fa-cogs"></i> <?php echo $this->lang->line('xin_system');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_4"> <a class="nav-link nav-tabs-link" href="#role" data-config="4" data-config-block="role" data-toggle="tab" aria-expanded="true"> <i class="fa fa-key"></i> <?php echo $this->lang->line('xin_employee_role');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_5"> <a class="nav-link nav-tabs-link" href="#attendance" data-config="5" data-config-block="attendance" data-toggle="tab" aria-expanded="true"> <i class="fa fa-book"></i> <?php echo $this->lang->line('xin_performance_attendance');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_10"> <a class="nav-link nav-tabs-link" href="#payroll" data-config="10" data-config-block="payroll" data-toggle="tab" aria-expanded="true"> <i class="fa fa-calculator"></i> <?php echo $this->lang->line('left_payroll');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_6"> <a class="nav-link nav-tabs-link" href="#job" data-config="6" data-config-block="job" data-toggle="tab" aria-expanded="true"> <i class="fa fa-bullhorn"></i> <?php echo $this->lang->line('left_recruitment');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_7"> <a class="nav-link nav-tabs-link" href="#email" data-config="7" data-config-block="email" data-toggle="tab" aria-expanded="true"> <i class="ti-email"></i> <?php echo $this->lang->line('xin_email_notifications');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_8"> <a class="nav-link nav-tabs-link" href="#animation" data-config="8" data-config-block="animation" data-toggle="tab" aria-expanded="true"> <i class="fa fa-diamond"></i> <?php echo $this->lang->line('xin_animation_effects');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_9"> <a class="nav-link nav-tabs-link" href="#notification" data-config="9" data-config-block="notification" data-toggle="tab" aria-expanded="true"> <i class="ti-check"></i> <?php echo $this->lang->line('xin_notification_position');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_11"> <a class="nav-link nav-tabs-link" href="#file_manager" data-config="11" data-config-block="file_manager" data-toggle="tab" aria-expanded="true"> <i class="fa fa-file"></i> <?php echo $this->lang->line('xin_files_manager');?> </a> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="general"  aria-expanded="false">
    <form id="company_info" action="<?php echo site_url("settings/company_info").'/'.$company_info_id ?>/" name="company_info" method="post">
      <input type="hidden" name="u_company_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_general');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="company_name"><?php echo $this->lang->line('xin_company_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_name');?>" name="company_name" type="text" value="<?php echo $company_name;?>">
            </div>
            <div class="form-group">
              <label for="contact_person"><?php echo $this->lang->line('xin_contact_person');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_contact_person');?>" name="contact_person" type="text" value="<?php echo $contact_person;?>">
            </div>
            <div class="form-group">
              <label for="email"><?php echo $this->lang->line('xin_email');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_email');?>" name="email" type="email" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
              <label for="phone"><?php echo $this->lang->line('xin_phone');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_phone');?>" name="phone" type="number" value="<?php echo $phone;?>">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="address"><?php echo $this->lang->line('xin_employee_address');?></label>
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
                <?php foreach($all_countries as $scountry) {?>
                <option value="<?php echo $scountry->country_id;?>" <?php if($country==$scountry->country_id):?> selected <?php endif;?>> <?php echo $scountry->country_name;?></option>
                <?php } ?>
              </select>
            </div>
            <input name="config_type" type="hidden" value="general">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="company_logo" style="display:none;">
    <div class="box box-block bg-white">
      <form id="logo_info" action="<?php echo site_url("settings/logo_info").'/'.$company_info_id ?>/" name="logo_info" method="post">
        <input type="hidden" name="company_logo" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_system_logos');?></strong></h2>
        <div class="row">
          <div class="col-md-6">
            <div class='form-group'>
              <h6><?php echo $this->lang->line('xin_first_logo');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="p_file" id="p_file">
              </span>
              <?php if($logo!='' && $logo!='no file') {?>
              <img src="<?php echo base_url().'uploads/logo/'.$logo;?>" width="70px" style="margin-left:30px;" id="u_file">
              <?php } else {?>
              <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file">
              <?php } ?>
              <br>
              <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
              <small>- <?php echo $this->lang->line('xin_best_logo_size');?></small><br />
              <small>- <?php echo $this->lang->line('xin_logo_whit_background_black_text');?></small> </div>
          </div>
          <div class="col-md-6">
            <div class='form-group'>
              <h6><?php echo $this->lang->line('xin_second_logo');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="p_file2" id="p_file2">
              </span>
              <?php if($logo_second!='' && $logo_second!='no file') {?>
              <img src="<?php echo base_url().'uploads/logo/'.$logo_second;?>" width="70px" style="margin-left:30px;" id="u_file2">
              <?php } else {?>
              <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file2">
              <?php } ?>
              <br>
              <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
              <small>- <?php echo $this->lang->line('xin_best_logo_size');?></small><br />
              <small>- <?php echo $this->lang->line('xin_logo_trans_background_white_text');?></small> </div>
          </div>
          <div class="col-md-6">
            <div class='form-group'>
              <h6><?php echo $this->lang->line('xin_favicon');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="favicon" id="favicon">
              </span>
              <?php if($logo_second!='' && $logo_second!='no file') {?>
              <img src="<?php echo base_url().'uploads/logo/'.$logo_second;?>" width="16px" style="margin-left:30px;" id="favicon1">
              <?php } else {?>
              <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="16px" style="margin-left:30px;" id="favicon1">
              <?php } ?>
              <br>
              <small>- <?php echo $this->lang->line('xin_logo_files_only_favicon');?></small><br />
              <small>- <?php echo $this->lang->line('xin_best_logo_size_favicon');?></small></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-right">
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="box box-block bg-white">
      <form id="singin_logo" name="singin_logo" method="post" enctype="multipart/form-data">
        <input type="hidden" name="company_logo" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_sign_in_page');?></strong> <?php echo $this->lang->line('xin_logo');?></h2>
        <div class="row">
          <div class="col-md-6">
            <div class='form-group'>
              <h6><?php echo $this->lang->line('xin_logo');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="p_file3" id="p_file3">
              </span>
              <?php if($sign_in_logo!='' && $sign_in_logo!='no file') {?>
              <img src="<?php echo base_url().'uploads/logo/signin/'.$sign_in_logo;?>" width="70px" style="margin-left:30px;" id="u_file3">
              <?php } else {?>
              <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file3">
              <?php } ?>
              <br>
              <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
              <small>- <?php echo $this->lang->line('xin_best_logo_size');?></small><br />
              <small>- <?php echo $this->lang->line('xin_logo_trans_background_white_text');?></small> </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-right">
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="system" style="display:none;">
    <form id="system_info" action="<?php echo site_url("settings/system_info").'/'.$company_info_id ?>/" name="system_info" method="post">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_system');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="company_name"><?php echo $this->lang->line('xin_application_name');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_system_settings');?>" name="application_name" type="text" value="<?php echo $application_name;?>" id="application_name">
          </div>
          <div class="form-group">
            <label for="email"><?php echo $this->lang->line('xin_default_currency');?></label>
            <select class="form-control select2-hidden-accessible" name="default_currency_symbol" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_default_currency_symbol');?>" tabindex="-1" aria-hidden="true">
              <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
              <?php foreach($this->Xin_model->get_currencies() as $currency){?>
              <?php $_currency = $currency->code.' - '.$currency->symbol;?>
              <option value="<?php echo $_currency;?>" <?php if($default_currency_symbol==$_currency):?> selected <?php endif;?>> <?php echo $_currency;?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="phone"><?php echo $this->lang->line('xin_default_currency_symbol_code');?></label>
            <select class="form-control" name="show_currency" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_show_currency');?>">
              <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
              <option value="code" <?php if($show_currency=='code'){?> selected <?php }?>><?php echo $this->lang->line('xin_currency_code');?></option>
              <option value="symbol" <?php if($show_currency=='symbol'){?> selected <?php }?>><?php echo $this->lang->line('xin_currency_symbol');?></option>
            </select>
          </div>
          <div class="form-group">
            <label for="phone"><?php echo $this->lang->line('xin_currency_position');?></label>
            <input type="hidden" name="notification_position" value="Bottom Left">
            <input type="hidden" name="enable_registration" value="no">
            <input type="hidden" name="login_with" value="username">
            <select class="form-control" name="currency_position" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_currency_position');?>">
              <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
              <option value="Prefix" <?php if($currency_position=='Prefix'){?> selected <?php }?>><?php echo $this->lang->line('xin_prefix');?></option>
              <option value="Suffix" <?php if($currency_position=='Suffix'){?> selected <?php }?>><?php echo $this->lang->line('xin_suffix');?></option>
            </select>
          </div>
          <div class="form-group">
            <label for="contact_role"><?php echo $this->lang->line('xin_enable_codeigniter_on_footer');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="enable_page_rendered" <?php if($enable_page_rendered=='yes'):?> checked="checked" <?php endif;?> value="yes" />
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="company_name"><?php echo $this->lang->line('xin_date_format');?></label>
            <br>
            <label class="custom-control custom-radio">
              <input id="date_format" name="date_format" type="radio" class="custom-control-input" value="d-m-Y" <?php if($date_format_xi=='d-m-Y'){?> checked <?php }?>>
              <span class="custom-control-indicator"></span> <span class="custom-control-description">dd-mm-YYYY (<?php echo date('d-m-Y');?>)</span> </label>
            <br>
            <label class="custom-control custom-radio">
              <input id="date_format" name="date_format" type="radio" class="custom-control-input" value="m-d-Y" <?php if($date_format_xi=='m-d-Y'){?> checked <?php }?>>
              <span class="custom-control-indicator"></span> <span class="custom-control-description">mm-dd-YYYY (<?php echo date('m-d-Y');?>)</span> </label>
            <br>
            <label class="custom-control custom-radio">
              <input id="date_format" name="date_format" type="radio" class="custom-control-input" value="d-M-Y" <?php if($date_format_xi=='d-M-Y'){?> checked <?php }?>>
              <span class="custom-control-indicator"></span> <span class="custom-control-description">dd-MM-YYYY (<?php echo date('d-M-Y');?>)</span> </label>
            <br>
            <label class="custom-control custom-radio">
              <input id="date_format" name="date_format" type="radio" class="custom-control-input" value="M-d-Y" <?php if($date_format_xi=='M-d-Y'){?> checked <?php }?>>
              <span class="custom-control-indicator"></span> <span class="custom-control-description">MM-dd-YYYY (<?php echo date('M-d-Y');?>)</span> </label>
          </div>
          <div class="form-group">
            <label for="footer_text"><?php echo $this->lang->line('xin_footer_text');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_footer_text');?>" name="footer_text" type="text" value="<?php echo $footer_text;?>">
          </div>
          <div class="form-group">
            <label for="contact_role"><?php echo $this->lang->line('xin_enable_year_on_footer');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="enable_current_year" <?php if($enable_current_year=='yes'):?> checked="checked" <?php endif;?> value="yes" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="role" style="display:none;">
    <form id="role_info" action="<?php echo site_url("settings/role_info").'/'.$company_info_id ?>/" name="role_info" method="post">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_employee_role');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="contact_role"><?php echo $this->lang->line('xin_employe_can_manage_contact_info');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="contact_role" <?php if($employee_manage_own_contact=='yes'):?> checked="checked" <?php endif;?> value="yes" />
            </div>
          </div>
          <div class="form-group">
            <label for="bank_account_role"><?php echo $this->lang->line('xin_employe_can_manage_bank_account');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="bank_account_role" <?php if($employee_manage_own_bank_account=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="edu_role"><?php echo $this->lang->line('xin_employe_can_manage_qualification');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="edu_role" <?php if($employee_manage_own_qualification=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="work_role"><?php echo $this->lang->line('xin_employe_can_manage_work_experience');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="work_role" <?php if($employee_manage_own_work_experience=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="doc_role"><?php echo $this->lang->line('xin_employe_can_manage_documents');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="doc_role" <?php if($employee_manage_own_document=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="pic_role"><?php echo $this->lang->line('xin_employe_can_manage_profile_picture');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="pic_role" <?php if($employee_manage_own_picture=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="profile_role"><?php echo $this->lang->line('xin_employe_can_manage_profile_info');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="profile_role" <?php if($employee_manage_own_profile=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="social_role"><?php echo $this->lang->line('xin_employe_can_manage_social_info');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="social_role" <?php if($employee_manage_own_social=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="attendance" style="display:none;">
    <form id="attendance_info" action="<?php echo site_url("settings/attendance_info").'/'.$company_info_id ?>/" name="attendance_info" method="post">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><?php echo $this->lang->line('xin_attendance_configuration');?></h2>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="enable_attendance"><?php echo $this->lang->line('xin_enable_clock_in_header');?> (<small><?php echo $this->lang->line('xin_it_will_show_everywhere');?></small>)</label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="enable_clock_in_btn" <?php if($enable_clock_in_btn=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="enable_clock_in_btn"><?php echo $this->lang->line('enable_clock_in_clock_out');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="enable_attendances" <?php if($enable_attendance=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="payroll" style="display:none;">
    <div class="box box-block bg-white">
      <form id="payroll_config" name="payroll_config" method="post" enctype="multipart/form-data">
        <input type="hidden" name="payroll_config" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('left_payroll');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
            <label for="contact_role"><?php echo $this->lang->line('xin_payslip_password_format');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <select class="form-control" name="payslip_password_format" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_one');?>">
                  <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                  <option value="dateofbirth" <?php if($payslip_password_format=='dateofbirth'){?> selected <?php }?>>Employee date of birth (<?php echo date('dmY');?>)</option>
                  <option value="contact_no" <?php if($payslip_password_format=='contact_no'){?> selected <?php }?>>Employee Contact Number. (<?php echo '123456789';?>)</option>
                  <option value="full_name" <?php if($payslip_password_format=='full_name'){?> selected <?php }?>>Employee First name Last name (<?php echo 'JhonDoe';?>)</option>
                  <option value="email" <?php if($payslip_password_format=='email'){?> selected <?php }?>>Employee Email Address (<?php echo 'employee@example.com';?>)</option>
                  <option value="password" <?php if($payslip_password_format=='password'){?> selected <?php }?>>Employee Password (<?php echo 'testpassword';?>)</option>
                  <option value="user_password" <?php if($payslip_password_format=='user_password'){?> selected <?php }?>>Employee Username & Password (<?php echo 'usernametestpassword';?>)</option>
                  <option value="employee_id" <?php if($payslip_password_format=='employee_id'){?> selected <?php }?>>Employee ID (<?php echo 'EMP001WA5';?>)</option>
                  <option value="employee_id_password" <?php if($payslip_password_format=='employee_id_password'){?> selected <?php }?>>Employee ID & Password (<?php echo 'EMP001WA5testpassword';?>)</option>
                  <option value="dateofbirth_name" <?php if($payslip_password_format=='dateofbirth_name'){?> selected <?php }?>>Employee date of birth & 2 first character from Name (<?php echo date('dmY').'JD';?>)</option>
                </select>  
            </div>
          </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
            <label for="contact_role"><?php echo $this->lang->line('xin_enable_password_generate_payslip');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="payslip_password_generate" <?php if($is_payslip_password_generate==1):?> checked="checked" <?php endif;?> value="1" />
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-right">
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="box box-block bg-white">
      <form id="payroll_logo" name="payroll_logo" method="post" enctype="multipart/form-data">
        <input type="hidden" name="payroll_logo" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('left_payroll');?></strong> <?php echo $this->lang->line('header_configuration');?> <small>(<?php echo $this->lang->line('xin_for_pdf');?>)</small></h2>
        <div class="row">
          <div class="col-md-6">
            <div class='form-group'>
              <h6><?php echo $this->lang->line('xin_logo');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="p_file5" id="p_file5">
              </span>
              <?php if($payroll_logo!='' && $payroll_logo!='no file') {?>
              <img src="<?php echo base_url().'uploads/logo/payroll/'.$payroll_logo;?>" width="70px" style="margin-left:30px;" id="u_file5">
              <?php } else {?>
              <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file5">
              <?php } ?>
              <br>
              <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
              <small>- <?php echo $this->lang->line('xin_best_logo_size');?></small><br />
              <small>- <?php echo $this->lang->line('xin_logo_whit_background_black_text');?></small> </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-right">
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="job" style="display:none;">
    <div class="box box-block bg-white">
      <form id="job_info" action="<?php echo site_url("settings/job_info").'/'.$company_info_id ?>/" name="job_info" method="post">
        <input type="hidden" name="user_id" value="<?php //echo $row['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('dashboard_recruitment');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="col-sm-12">
          <div class="form-group">
            <label for="enable_job"><?php echo $this->lang->line('xin_enable_jobs_for_employees');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="enable_job2" <?php if($enable_job_application_candidates=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="job_application_format"><?php echo $this->lang->line('xin_job_application_file_format');?></label>
            <br>
            <input type="text" value="<?php echo $job_application_format;?>" data-role="tagsinput" name="job_application_format">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="box box-block bg-white">
      <form id="job_logo" name="job_logo" method="post" enctype="multipart/form-data">
        <input type="hidden" name="job_logo" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_job_listing');?></strong> <?php echo $this->lang->line('xin_logo');?> <small>(<?php echo $this->lang->line('left_frontend');?>)</small></h2>
        <div class="row">
          <div class="col-md-6">
            <div class='form-group'>
              <h6><?php echo $this->lang->line('xin_logo');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="p_file4" id="p_file4">
              </span>
              <?php if($job_logo!='' && $job_logo!='no file') {?>
              <img src="<?php echo base_url().'uploads/logo/job/'.$job_logo;?>" width="70px" style="margin-left:30px;" id="u_file4">
              <?php } else {?>
              <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file4">
              <?php } ?>
              <br>
              <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
              <small>- <?php echo $this->lang->line('xin_best_logo_size_recruitment');?> </small><br />
              <small>- <?php echo $this->lang->line('xin_logo_whit_background_black_text');?></small> </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-right">
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="email" style="display:none;">
    <form id="email_info" action="<?php echo site_url("settings/email_info").'/'.$company_info_id ?>/" name="email_info" method="post">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_email_notification_config');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="company_name"><?php echo $this->lang->line('xin_email_notification_enable');?></label>
            <br>
            <div class="pull-xs-left m-r-1">
              <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="srole_email_notification" <?php if($enable_email_notification=='yes'):?> checked="checked" <?php endif;?> value="yes">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="animation"  aria-expanded="false" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_animation_effects');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
      <form id="animation_effect_info" action="<?php echo site_url("settings/animation_effect_info");?>" name="animation_effect_info" method="post">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <div class="row">
          <div class="col-md-12">
            <div class="col-sm-6">
              <input name="employee_manage_own_bank_account" type="hidden" value="yes">
              <div class="form-group">
                <label for="animation_effect_topmenu"><?php echo $this->lang->line('xin_animation_effects');?></label>
                <br>
                <select class="form-control" name="animation_effect_topmenu" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_animation_effects');?>">
                  <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                  <option value="fadeInDown" <?php if($animation_effect_topmenu=='fadeInDown'){?> selected <?php }?>>fadeInDown</option>
                  <option value="fadeInUp" <?php if($animation_effect_topmenu=='fadeInUp'){?> selected <?php }?>>fadeInUp</option>
                  <option value="fadeInLeft" <?php if($animation_effect_topmenu=='fadeInLeft'){?> selected <?php }?>>fadeInLeft</option>
                  <option value="fadeInRight" <?php if($animation_effect_topmenu=='fadeInRight'){?> selected <?php }?>>fadeInRight</option>
                  <option value="fadeIn" <?php if($animation_effect_topmenu=='fadeIn'){?> selected <?php }?>>fadeIn</option>
                  <option value="growIn" <?php if($animation_effect_topmenu=='growIn'){?> selected <?php }?>>growIn</option>
                  <option value="rotateIn" <?php if($animation_effect_topmenu=='rotateIn'){?> selected <?php }?>>rotateIn</option>
                  <option value="rotateInUpLeft" <?php if($animation_effect_topmenu=='rotateInUpLeft'){?> selected <?php }?>>rotateInUpLeft</option>
                  <option value="rotateInDownLeft" <?php if($animation_effect_topmenu=='rotateInDownLeft'){?> selected <?php }?>>rotateInDownLeft</option>
                  <option value="rotateInUpRight" <?php if($animation_effect_topmenu=='rotateInUpRight'){?> selected <?php }?>>rotateInUpRight</option>
                  <option value="rotateInDownRight" <?php if($animation_effect_topmenu=='rotateInDownRight'){?> selected <?php }?>>rotateInDownRight</option>
                  <option value="rollIn" <?php if($animation_effect_topmenu=='rollIn'){?> selected <?php }?>>rollIn</option>
                  <option value="swing" <?php if($animation_effect_topmenu=='swing'){?> selected <?php }?>>swing</option>
                  <option value="tada" <?php if($animation_effect_topmenu=='tada'){?> selected <?php }?>>tada</option>
                  <option value="pulse" <?php if($animation_effect_topmenu=='pulse'){?> selected <?php }?>>pulse</option>
                  <option value="flipInX" <?php if($animation_effect_topmenu=='flipInX'){?> selected <?php }?>>flipInX</option>
                  <option value="flipInY" <?php if($animation_effect_topmenu=='flipInY'){?> selected <?php }?>>flipInY</option>
                </select>
                <br />
                <p class="text-muted"><i class="fa fa-arrow-up"></i> <?php echo $this->lang->line('xin_set_animation_effect_for_top');?></p>
                <input type="hidden" name="animation_effect" id="animation_effect" value="fadeInDown" />
              </div>
            </div>
            <div class="col-sm-6">
              <input name="employee_manage_own_bank_account" type="hidden" value="yes">
              <div class="form-group">
                <label for="animation_effect_modal"><?php echo $this->lang->line('xin_animation_effects');?></label>
                <br>
                <select class="form-control" name="animation_effect_modal" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_animation_effects');?>">
                  <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                  <option value="fadeInDown" <?php if($animation_effect_modal=='fadeInDown'){?> selected <?php }?>>fadeInDown</option>
                  <option value="fadeInUp" <?php if($animation_effect_modal=='fadeInUp'){?> selected <?php }?>>fadeInUp</option>
                  <option value="fadeInLeft" <?php if($animation_effect_modal=='fadeInLeft'){?> selected <?php }?>>fadeInLeft</option>
                  <option value="fadeInRight" <?php if($animation_effect_modal=='fadeInRight'){?> selected <?php }?>>fadeInRight</option>
                  <option value="fadeIn" <?php if($animation_effect_modal=='fadeIn'){?> selected <?php }?>>fadeIn</option>
                  <option value="growIn" <?php if($animation_effect_modal=='growIn'){?> selected <?php }?>>growIn</option>
                  <option value="rotateIn" <?php if($animation_effect_modal=='rotateIn'){?> selected <?php }?>>rotateIn</option>
                  <option value="rotateInUpLeft" <?php if($animation_effect_modal=='rotateInUpLeft'){?> selected <?php }?>>rotateInUpLeft</option>
                  <option value="rotateInDownLeft" <?php if($animation_effect_modal=='rotateInDownLeft'){?> selected <?php }?>>rotateInDownLeft</option>
                  <option value="rotateInUpRight" <?php if($animation_effect_modal=='rotateInUpRight'){?> selected <?php }?>>rotateInUpRight</option>
                  <option value="rotateInDownRight" <?php if($animation_effect_modal=='rotateInDownRight'){?> selected <?php }?>>rotateInDownRight</option>
                  <option value="rollIn" <?php if($animation_effect_modal=='rollIn'){?> selected <?php }?>>rollIn</option>
                  <option value="swing" <?php if($animation_effect_modal=='swing'){?> selected <?php }?>>swing</option>
                  <option value="tada" <?php if($animation_effect_modal=='tada'){?> selected <?php }?>>tada</option>
                  <option value="pulse" <?php if($animation_effect_modal=='pulse'){?> selected <?php }?>>pulse</option>
                  <option value="flipInX" <?php if($animation_effect_modal=='flipInX'){?> selected <?php }?>>flipInX</option>
                  <option value="flipInY" <?php if($animation_effect_modal=='flipInY'){?> selected <?php }?>>flipInY</option>
                </select>
                <br />
                <p class="text-muted"><i class="fa fa-arrow-up"></i> <?php echo $this->lang->line('xin_set_animation_effect_for_modals');?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary save col-right"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="notification" style="display:none;">
    <form id="notification_position_info" action="<?php echo site_url("settings/notification_position_info");?>" name="notification_position_info" method="post">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_notification_position');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="notification_position"><?php echo $this->lang->line('dashboard_position');?></label>
              <select class="form-control" name="notification_position" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_position');?>">
                <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                <option value="toast-top-right" <?php if($notification_position=='toast-top-right'){?> selected <?php }?>><?php echo $this->lang->line('xin_top_right');?></option>
                <option value="toast-bottom-right" <?php if($notification_position=='toast-bottom-right'){?> selected <?php }?>><?php echo $this->lang->line('xin_bottom_right');?></option>
                <option value="toast-bottom-left" <?php if($notification_position=='toast-bottom-left'){?> selected <?php }?>><?php echo $this->lang->line('xin_bottom_left');?></option>
                <option value="toast-top-left" <?php if($notification_position=='toast-top-left'){?> selected <?php }?>><?php echo $this->lang->line('xin_top_left');?></option>
                <option value="toast-top-center" <?php if($notification_position=='toast-top-center'){?> selected <?php }?>><?php echo $this->lang->line('xin_top_center');?></option>
              </select>
              <br />
              <small class="text-muted"><i class="icon-arrow-up8"></i> <?php echo $this->lang->line('xin_set_position_for_notifications');?></small> </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="company_name"><?php echo $this->lang->line('xin_close_button');?></label>
              <br>
              <div class="pull-xs-left m-r-1">
                <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="sclose_btn" <?php if($notification_close_btn=='true'):?> checked="checked" <?php endif;?> value="true" />
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="company_name"><?php echo $this->lang->line('xin_progress_bar');?></label>
              <br>
              <div class="pull-xs-left m-r-1">
                <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="snotification_bar" <?php if($notification_bar=='true'):?> checked="checked" <?php endif;?> value="true" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div role="tabpanel" class="col-md-9 current-tab animated fadeInRight" id="file_manager" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_files_manager');?></strong> <?php echo $this->lang->line('header_configuration');?></h2>
      <form id="file_setting_info" action="<?php echo site_url("files/setting_info"); ?>" name="setting_info" method="post">
        <input type="hidden" id="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <div class="row">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="enable_job"><?php echo $this->lang->line('xin_file_maxsize');?></label>
              <br>
              <div class="pull-xs-left m-r-1">
                <div class="input-group">
                  <input type="number" class="form-control" value="<?php echo $file_setting[0]->maximum_file_size;?>" name="maximum_file_size" placeholder="<?php echo $this->lang->line('xin_file_size_mb');?>">
                  <div class="input-group-addon">MB</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-10">
            <div class="form-group">
              <label for="job_application_format"><?php echo $this->lang->line('xin_allowed_extensions');?></label>
              <br>
              <input type="text" value="<?php echo $file_setting[0]->allowed_extensions;?>" data-role="tagsinput" name="allowed_extensions">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="company_name"><?php echo $this->lang->line('xin_employee_can_view_download_other_files');?></label>
              <br>
              <div class="pull-xs-left m-r-1">
                <input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" data-secondary-color="#ddd" id="view_all_files" <?php if($file_setting[0]->is_enable_all_files=='yes'):?> checked="checked" <?php endif;?> value="yes" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
