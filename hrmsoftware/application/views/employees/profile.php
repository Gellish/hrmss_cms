<?php
/* Profile view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']);?>
<?php $system = $this->Xin_model->read_setting_info(1);?>

<div class="profile-header mb-1">
  <div class="profile-header-cover img-cover" style="background-image: url(<?php echo base_url().'uploads/profile/background/'.$user[0]->profile_background;?>);" ></div>
  <div class="profile-header-counters clearfix">
    <div class="container-fluid">
      <div class="float-xs-right"> <a href="#" class="text-black">
        <h5 class="font-weight-bold"><?php echo $this->lang->line('dashboard_last_login');?></h5>
        <span class="text-muted">
        <?php if($system[0]->enable_profile_background=='yes'):?>
        <span class="profile-btn" style="position:absolute; margin-top:-105px;">
        <form name="profile_background" id="profile_background" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
          <input type="file" name="p_file" id="p_file">
          </span> <span>
          <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
          </span>
        </form>
        </span>
        <?php endif;?>
        <?php 
			  $gdate = explode(' ',$last_login_date);
			  $login_date = $this->Xin_model->set_date_format($gdate[0]);
			  echo $login_date.' '.date('h:i A', strtotime($last_login_date));?>
        <?php echo $this->lang->line('xin_e_details_from');?> <?php echo $last_login_ip;?></span> </a> </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4 col-md-3">
    <div class="card profile-card" style="margin-top: -316px;">
      <div class="user-5">
        <div class="u-content">
          <div class="avatar box-96 mb-2">
            <?php if($profile_picture!='' && $profile_picture!='no file') {?>
            <img src="<?php echo base_url().'uploads/profile/'.$profile_picture;?>" alt="" id="user_avatar" class="b-a-radius-circle user_profile_avatar">
            <?php } else {?>
            <?php if($gender=='Male') { ?>
            <?php $de_file = base_url().'uploads/profile/default_male.jpg';?>
            <?php } else { ?>
            <?php $de_file = base_url().'uploads/profile/default_female.jpg';?>
            <?php } ?>
            <img src="<?php echo $de_file;?>" alt="" id="user_avatar" class=" b-a-radius-circle user_profile_avatar">
            <?php } ?>
            <i class="status bg-success bottom right"></i> </div>
          <h5><a class="text-black" href="javascript:void(0);"><?php echo $first_name. ' ' .$last_name;?></a></h5>
          <p class="text-muted mb-1"><?php echo $designation;?></p>
          <button type="button" class="btn bg-facebook btn-circle" data-toggle="tooltip" data-placement="top" data-title="<?php echo $this->lang->line('xin_e_details_fb');?>" data-original-title="" title="">
          <a href="<?php echo $facebook_link;?>" target="_blank" class="profile-social"> <i class="fa fa-facebook"></i></a>
          </button>
          <button type="button" class="btn bg-twitter btn-circle" data-toggle="tooltip" data-placement="top" data-title="<?php echo $this->lang->line('xin_e_details_twit');?>" data-original-title="" title="">
          <a href="<?php echo $twitter_link;?>" target="_blank" class="profile-social"> <i class="fa fa-twitter"></i></a>
          </button>
          <button type="button" class="btn bg-googleplus btn-circle" data-toggle="tooltip" data-placement="top" data-title="<?php echo $this->lang->line('xin_e_details_gplus');?>" data-original-title="" title="">
          <a href="<?php echo $google_plus_link;?>" target="_blank" class="profile-social"> <i class="fa fa-google-plus"></i></a>
          </button>
          <button type="button" class="btn bg-linkedin btn-circle" data-toggle="tooltip" data-placement="top" data-title="<?php echo $this->lang->line('xin_e_details_lnkdin');?>" data-original-title="" title="">
          <a href="<?php echo $linkdedin_link;?>" target="_blank" class="profile-social"> <i class="fa fa-linkedin"></i></a>
          </button>
          <button type="button" class="btn bg-dropbox btn-circle" data-toggle="tooltip" data-placement="top" data-title="<?php echo $this->lang->line('xin_e_details_blgr');?>" data-original-title="" title="">
          <a href="<?php echo $blogger_link;?>" target="_blank" class="profile-social"> <i class="fa fa-pencil"></i></a>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row m-b-1">
  <div class="col-md-3">
    <div class="box bg-white">
      <ul class="nav nav-4 nav-tabs-link-cl">
        <?php if($system[0]->employee_manage_own_profile=='yes'){?>
        <li class="nav-item nav-item-link active-link" id="user_details_1"> <a class="nav-link nav-tabs-link" href="#user_basic_info" data-profile="1" data-profile-block="user_basic_info" data-toggle="tab" aria-expanded="true"> <i class="fa fa-user"></i> <?php echo $this->lang->line('xin_e_details_basic');?> </a> </li>
        <?php } ?>
        <?php if($system[0]->employee_manage_own_picture=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_2"> <a class="nav-link nav-tabs-link" href="#profile-picture" data-profile="2" data-profile-block="profile_picture" data-toggle="tab" aria-expanded="true"> <i class="fa fa-camera"></i> <?php echo $this->lang->line('xin_e_details_profile_picture');?> </a> </li>
        <?php } ?>
        <li class="nav-item nav-item-link" id="user_details_15"> <a class="nav-link nav-tabs-link" href="#immigration" data-profile="15" data-profile-block="immigration" data-toggle="tab" aria-expanded="true"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_employee_immigration');?> </a> </li>
        <?php if($system[0]->employee_manage_own_contact=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_3"> <a class="nav-link nav-tabs-link" href="#contact" data-profile="3" data-profile-block="contact" data-toggle="tab" aria-expanded="true"> <i class="fa fa-phone"></i> <?php echo $this->lang->line('xin_employee_emergency_contacts');?> </a> </li>
        <?php } ?>
        <?php if($system[0]->employee_manage_own_social=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_4"> <a class="nav-link nav-tabs-link" href="#social_networking" data-profile="4" data-profile-block="social_networking" data-toggle="tab" aria-expanded="true"> <i class="fa fa-users"></i> <?php echo $this->lang->line('xin_e_details_social');?> </a> </li>
        <?php } ?>
        <?php if($system[0]->employee_manage_own_document=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_5"> <a class="nav-link nav-tabs-link" href="#document" data-profile="5" data-profile-block="document" data-toggle="tab" aria-expanded="true"> <i class="fa fa-file"></i> <?php echo $this->lang->line('xin_e_details_document');?> </a> </li>
        <?php } ?>
        <?php if($system[0]->employee_manage_own_qualification=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_6"> <a class="nav-link nav-tabs-link" href="#qualification" data-profile="6" data-profile-block="qualification" data-toggle="tab" aria-expanded="true"> <i class="fa fa-book"></i> <?php echo $this->lang->line('xin_e_details_qualification');?> </a> </li>
        <?php } ?>
        <?php if($system[0]->employee_manage_own_work_experience=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_7"> <a class="nav-link nav-tabs-link" href="#work_experience" data-profile="7" data-profile-block="work_experience" data-toggle="tab" aria-expanded="true"> <i class="fa fa-hourglass-2"></i> <?php echo $this->lang->line('xin_e_details_w_experience');?> </a> </li>
        <?php } ?>
        <?php if($system[0]->employee_manage_own_bank_account=='yes'){?>
        <li class="nav-item nav-item-link" id="user_details_8"> <a class="nav-link nav-tabs-link" href="#bank_account" data-profile="8" data-profile-block="bank_account" data-toggle="tab" aria-expanded="true"> <i class="fa fa-laptop"></i> <?php echo $this->lang->line('xin_e_details_baccount');?> </a> </li>
        <?php } ?>
        <li class="nav-item nav-item-link" id="user_details_9"> <a class="nav-link nav-tabs-link" href="#contract" data-profile="9" data-profile-block="contract" data-toggle="tab" aria-expanded="true"> <i class="fa fa-pencil"></i> <?php echo $this->lang->line('xin_e_details_contract');?> </a> </li>
        <li class="nav-item nav-item-link" id="user_details_11"> <a class="nav-link nav-tabs-link" href="#leave" data-profile="11" data-profile-block="leave" data-toggle="tab" aria-expanded="true"> <i class="fa fa-coffee"></i> <?php echo $this->lang->line('xin_e_details_leave');?> </a> </li>
        <li class="nav-item nav-item-link" id="user_details_12"> <a class="nav-link nav-tabs-link" href="#shift" data-profile="12" data-profile-block="shift" data-toggle="tab" aria-expanded="true"> <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('xin_e_details_shift');?> </a> </li>
        <li class="nav-item nav-item-link b-b-0" id="user_details_14"> <a class="nav-link nav-tabs-link" href="#change_password" data-profile="14" data-profile-block="change_password" data-toggle="tab" aria-expanded="true"> <i class="fa fa-key"></i> <?php echo $this->lang->line('xin_e_details_cpassword');?> </a> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="user_basic_info"  aria-expanded="false">
    <form id="basic_info" action="<?php echo site_url("profile/user_basic_info") ?>" name="basic_info" method="post">
      <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_e_details_basic_info');?></strong></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="first_name"><?php echo $this->lang->line('xin_employee_first_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_first_name');?>" name="first_name" type="text" value="<?php echo $first_name;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="last_name" class="control-label"><?php echo $this->lang->line('xin_employee_last_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_last_name');?>" name="last_name" type="text" value="<?php echo $last_name;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email" class="control-label"><?php echo $this->lang->line('dashboard_email');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_email');?>" name="email" type="text" value="<?php echo $email;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="date_of_birth"><?php echo $this->lang->line('xin_employee_dob');?></label>
              <input class="form-control date" readonly placeholder="<?php echo $this->lang->line('xin_employee_dob');?>" name="date_of_birth" type="text" value="<?php echo $date_of_birth;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="gender" class="control-label"><?php echo $this->lang->line('xin_employee_gender');?></label>
              <select class="form-control" name="gender" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee_gender');?>">
                <option value="Male" <?php if($gender=='Male'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_gender_male');?></option>
                <option value="Female" <?php if($gender=='Female'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_gender_female');?></option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="marital_status" class="control-label"><?php echo $this->lang->line('xin_employee_mstatus');?></label>
              <select class="form-control" name="marital_status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee_mstatus');?>">
                <option value="Single" <?php if($marital_status=='Single'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_status_single');?></option>
                <option value="Married" <?php if($marital_status=='Married'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_status_married');?></option>
                <option value="Widowed" <?php if($marital_status=='Widowed'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_status_widowed');?></option>
                <option value="Divorced or Separated" <?php if($marital_status=='Divorced or Separated'):?> selected <?php endif; ?>><?php echo $this->lang->line('xin_status_divorced_separated');?></option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="contact_no" class="control-label"><?php echo $this->lang->line('xin_contact_number');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_contact_number');?>" name="contact_no" type="text" value="<?php echo $contact_no;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="address"><?php echo $this->lang->line('xin_employee_address');?></label>
              <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_address');?>" name="address" cols="30" rows="3" id="address"><?php echo $address;?></textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="profile_picture" style="display:none;">
    <form id="f_profile_picture" action="<?php echo site_url("employees/profile_picture") ?>" name="profile_picture" method="post">
      <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
      <input type="hidden" name="session_id" id="session_id" value="<?php echo $session['user_id'];?>">
      <input type="hidden" name="u_profile_picture" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_e_details_profile_picture');?></strong></h2>
        <div class="row">
          <div class="col-md-12">
            <div class='form-group'> <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="p_file" id="p_file">
              </span>
              <?php if($profile_picture!='' && $profile_picture!='no file') {?>
              <img src="<?php echo site_url().'uploads/profile/'.$profile_picture;?>" width="50px" style="margin-left:20px;" id="u_file">
              <?php } else {?>
              <?php if($gender=='Male') { ?>
              <?php $de_file = site_url().'uploads/profile/default_male.jpg';?>
              <?php } else { ?>
              <?php $de_file = site_url().'uploads/profile/default_female.jpg';?>
              <?php } ?>
              <img src="<?php echo $de_file;?>" width="50px" style="margin-left:20px;" id="u_file">
              <?php } ?>
              <br>
              <small><?php echo $this->lang->line('xin_e_details_picture_type');?></small>
              <?php if($profile_picture!='' && $profile_picture!='no file') {?>
              <br />
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remove_profile_picture" value="1" name="remove_profile_picture">
                <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_e_details_remove_pic');?></span> </label>
              <?php } else {?>
              <div id="remove_file" style="display:none;">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="remove_profile_picture" value="1" name="remove_profile_picture">
                  <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_e_details_remove_pic');?></span> </label>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="social_networking" style="display:none;">
    <form id="f_social_networking" action="<?php echo site_url("employees/social_info") ?>" name="social_networking" method="post">
      <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
      <input type="hidden" name="u_basic_info" value="UPDATE">
      <div class="box box-block bg-white">
        <h2><strong><?php echo $this->lang->line('xin_e_details_social');?></strong></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="facebook_profile"><?php echo $this->lang->line('xin_e_details_fb_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_fb_profile');?>" name="facebook_link" type="text" value="<?php echo $facebook_link;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="facebook_profile"><?php echo $this->lang->line('xin_e_details_twit_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_twit_profile');?>" name="twitter_link" type="text" value="<?php echo $twitter_link;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="twitter_profile"><?php echo $this->lang->line('xin_e_details_blogr_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_blogr_profile');?>" name="blogger_link" type="text" value="<?php echo $blogger_link;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="blogger_profile"><?php echo $this->lang->line('xin_e_details_linkd_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_linkd_profile');?>" name="linkdedin_link" type="text" value="<?php echo $linkdedin_link;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="blogger_profile"><?php echo $this->lang->line('xin_e_details_gplus_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_gplus_profile');?>" name="google_plus_link" type="text" value="<?php echo $google_plus_link;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="linkdedin_profile"><?php echo $this->lang->line('xin_e_details_insta_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_insta_profile');?>" name="instagram_link" type="text" value="<?php echo $instagram_link;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="linkdedin_profile"><?php echo $this->lang->line('xin_e_details_pintrst_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_pintrst_profile');?>" name="pinterest_link" type="text" value="<?php echo $pinterest_link;?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="linkdedin_profile"><?php echo $this->lang->line('xin_e_details_utube_profile');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_utube_profile');?>" name="youtube_link" type="text" value="<?php echo $youtube_link;?>">
            </div>
          </div>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="immigration" style="display:none;">
    <div class="box box-block bg-white">
      <form id="immigration_info" action="<?php echo site_url("employees/immigration_info") ?>" enctype="multipart/form-data" name="immigration_info" method="post">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_document_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_employee_immigration');?></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="relation"><?php echo $this->lang->line('xin_e_details_document');?></label>
              <select name="document_type_id" id="document_type_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_choose_dtype');?>">
                <option value=""></option>
                <?php foreach($all_document_types as $document_type) {?>
                <option value="<?php echo $document_type->document_type_id;?>"> <?php echo $document_type->document_type;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="document_number" class="control-label"><?php echo $this->lang->line('xin_employee_document_number');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_document_number');?>" name="document_number" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="issue_date" class="control-label"><?php echo $this->lang->line('xin_issue_date');?></label>
              <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_issue_date');?>" name="issue_date" type="text">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="expiry_date" class="control-label"><?php echo $this->lang->line('xin_e_details_doe');?></label>
              <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_e_details_doe');?>" name="expiry_date" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <h6><?php echo $this->lang->line('xin_e_details_document_file');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="document_file" id="p_file2">
              </span><br />
              <small><?php echo $this->lang->line('xin_e_details_d_type_file');?></small></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="eligible_review_date" class="control-label"><?php echo $this->lang->line('xin_eligible_review_date');?></label>
              <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_eligible_review_date');?>" name="eligible_review_date" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="send_mail"><?php echo $this->lang->line('xin_country');?></label>
              <select class="form-control" name="country" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_country');?>">
                <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                <?php foreach($all_countries as $scountry) {?>
                <option value="<?php echo $scountry->country_id;?>"> <?php echo $scountry->country_name;?></option>
                <?php } ?>
              </select>
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
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_assigned_immigration');?></strong> <?php echo $this->lang->line('xin_records');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_imgdocument" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_e_details_document');?></th>
              <th><?php echo $this->lang->line('xin_issue_date');?></th>
              <th><?php echo $this->lang->line('xin_expiry_date');?></th>
              <th><?php echo $this->lang->line('xin_issued_by');?></th>
              <th><?php echo $this->lang->line('xin_eligible_review_date');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php if($system[0]->employee_manage_own_contact=='yes'){?>
  <div class="col-md-9 current-tab animated fadeInRight" id="contact" style="display:none;">
    <div class="box box-block bg-white">
      <form id="contact_info" action="<?php echo site_url("employees/contact_info") ?>" name="contact_info" method="post">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="ADD">
        <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_contact');?></h2>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="relation"><?php echo $this->lang->line('xin_e_details_relation');?></label>
              <select class="form-control" name="relation" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_one');?>">
                <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                <option value="Self"><?php echo $this->lang->line('xin_self');?></option>
                <option value="Parent"><?php echo $this->lang->line('xin_parent');?></option>
                <option value="Spouse"><?php echo $this->lang->line('xin_spouse');?></option>
                <option value="Child"><?php echo $this->lang->line('xin_child');?></option>
                <option value="Sibling"><?php echo $this->lang->line('xin_sibling');?></option>
                <option value="In Laws"><?php echo $this->lang->line('xin_in_laws');?></option>
              </select>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label for="work_email" class="control-label"><?php echo $this->lang->line('dashboard_email');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_work');?>" name="work_email" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="is_primary" value="1" name="is_primary">
                <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_e_details_pcontact');?></span> </label>
              &nbsp;
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="is_dependent" value="1" name="is_dependent">
                <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_e_details_dependent');?></span> </label>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_dependent');?>" name="personal_email" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="name" class="control-label"><?php echo $this->lang->line('xin_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_name');?>" name="contact_name" type="text">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group" id="designation_ajax">
              <label for="address_1" class="control-label"><?php echo $this->lang->line('xin_address');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_1');?>" name="address_1" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="work_phone"><?php echo $this->lang->line('xin_phone');?></label>
              <div class="row">
                <div class="col-xs-8">
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_work');?>" name="work_phone" type="text">
                </div>
                <div class="col-xs-4">
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_phone_ext');?>" name="work_phone_extension" type="text">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_2');?>" name="address_2" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_mobile');?>" name="mobile_phone" type="text">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-5">
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_city');?>" name="city" type="text">
                </div>
                <div class="col-xs-4">
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_state');?>" name="state" type="text">
                </div>
                <div class="col-xs-3">
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_zipcode');?>" name="zipcode" type="text">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_home');?>" name="home_phone" type="text">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <select name="country" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_country');?>">
                <option value=""></option>
                <?php foreach($all_countries as $country) {?>
                <option value="<?php echo $country->country_id;?>"> <?php echo $country->country_name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </form>
    </div>
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_contacts');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_contact" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_employees_full_name');?></th>
              <th><?php echo $this->lang->line('xin_e_details_relation');?></th>
              <th><?php echo $this->lang->line('dashboard_email');?></th>
              <th><?php echo $this->lang->line('xin_e_details_mobile');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->employee_manage_own_document=='yes'){?>
  <div class="col-md-9 current-tab animated fadeInRight" id="document" style="display:none;">
    <div class="box box-block bg-white">
      <form id="document_info" action="<?php echo site_url("employees/document_info") ?>" enctype="multipart/form-data" name="document_info" method="post">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_document_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_document');?></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="relation"><?php echo $this->lang->line('xin_e_details_dtype');?></label>
              <select name="document_type_id" id="document_type_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_choose_dtype');?>">
                <option value=""></option>
                <?php foreach($all_document_types as $document_type) {?>
                <option value="<?php echo $document_type->document_type_id;?>"> <?php echo $document_type->document_type;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="date_of_expiry" class="control-label"><?php echo $this->lang->line('xin_e_details_doe');?></label>
              <input class="form-control date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_doe');?>" name="date_of_expiry" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title" class="control-label"><?php echo $this->lang->line('xin_e_details_dtitle');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_dtitle');?>" name="title" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email" class="control-label"><?php echo $this->lang->line('xin_e_details_notifyemail');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_notifyemail');?>" name="email" type="email">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="description" class="control-label"><?php echo $this->lang->line('xin_description');?></label>
              <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description');?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="3" id="d_description"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <h6><?php echo $this->lang->line('xin_e_details_document_file');?></h6>
              <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
              <input type="file" name="document_file" id="document_file">
              </span> <br /><small><?php echo $this->lang->line('xin_e_details_d_type_file');?></small></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="send_mail"><?php echo $this->lang->line('xin_e_details_send_notifyemail');?></label>
              <select name="send_mail" id="send_mail" class="form-control" data-plugin="select_hrm">
                <option value="1"><?php echo $this->lang->line('xin_yes');?></option>
                <option value="2"><?php echo $this->lang->line('xin_no');?></option>
              </select>
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
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_documents');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_document" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_e_details_dtype');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
              <th><?php echo $this->lang->line('xin_e_details_notifyemail');?></th>
              <th><?php echo $this->lang->line('xin_e_details_doe');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->employee_manage_own_qualification=='yes'){?>
  <div class="col-md-9 current-tab animated fadeInRight" id="qualification" style="display:none;">
    <div class="box box-block bg-white">
      <form id="qualification_info" action="<?php echo site_url("employees/qualification_info") ?>" name="qualification_info" method="post">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_qualification');?></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_e_details_inst_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_inst_name');?>" name="name" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="education_level" class="control-label"><?php echo $this->lang->line('xin_e_details_edu_level');?></label>
              <select class="form-control" name="education_level" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_edu_level');?>">
                <?php foreach($all_education_level as $education_level) {?>
                <option value="<?php echo $education_level->education_level_id?>"><?php echo $education_level->name?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="from_year" class="control-label"><?php echo $this->lang->line('xin_e_details_timeperiod');?></label>
              <div class="row">
                <div class="col-md-6">
                  <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_e_details_from');?>" name="from_year" type="text">
                </div>
                <div class="col-md-6">
                  <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('dashboard_to');?>" name="to_year" type="text">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="language" class="control-label"><?php echo $this->lang->line('xin_e_details_language');?></label>
              <select class="form-control" name="language" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_language');?>">
                <?php foreach($all_qualification_language as $qualification_language) {?>
                <option value="<?php echo $qualification_language->language_id?>"><?php echo $qualification_language->name?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="skill" class="control-label"><?php echo $this->lang->line('xin_e_details_skill');?></label>
              <select class="form-control" name="skill" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_skill');?>">
                <option value=""></option>
                <?php foreach($all_qualification_skill as $qualification_skill) {?>
                <option value="<?php echo $qualification_skill->skill_id?>"><?php echo $qualification_skill->name?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="to_year" class="control-label"><?php echo $this->lang->line('xin_description');?></label>
              <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description');?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="3" id="d_description"></textarea>
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
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_qualification');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_qualification" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_e_details_inst_name');?></th>
              <th><?php echo $this->lang->line('xin_e_details_timeperiod');?></th>
              <th><?php echo $this->lang->line('xin_e_details_edu_level');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->employee_manage_own_work_experience=='yes'){?>
  <div class="col-md-9 current-tab animated fadeInRight" id="work_experience" style="display:none;">
    <div class="box box-block bg-white">
      <form id="work_experience_info" action="<?php echo site_url("employees/work_experience_info") ?>" name="work_experience_info" method="post">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_w_experience');?></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="company_name"><?php echo $this->lang->line('xin_company_name');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_name');?>" name="company_name" type="text" value="" id="company_name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="post"><?php echo $this->lang->line('xin_e_details_post');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_post');?>" name="post" type="text" value="" id="post">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="from_year" class="control-label"><?php echo $this->lang->line('xin_e_details_timeperiod');?></label>
              <div class="row">
                <div class="col-md-6">
                  <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_e_details_from');?>" name="from_date" type="text">
                </div>
                <div class="col-md-6">
                  <input class="form-control date" readonly="readonly" placeholder="<?php echo $this->lang->line('dashboard_to');?>" name="to_date" type="text">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="description"><?php echo $this->lang->line('xin_description');?></label>
              <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description');?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="4" id="description"></textarea>
              <span class="countdown"></span> </div>
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
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_w_experience');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_work_experience" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_company_name');?></th>
              <th><?php echo $this->lang->line('xin_e_details_frm_date');?></th>
              <th><?php echo $this->lang->line('xin_e_details_to_date');?></th>
              <th><?php echo $this->lang->line('xin_e_details_post');?></th>
              <th><?php echo $this->lang->line('xin_description');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->employee_manage_own_bank_account=='yes'){?>
  <div class="col-md-9 current-tab animated fadeInRight" id="bank_account" style="display:none;">
    <div class="box box-block bg-white">
      <form id="bank_account_info" action="<?php echo site_url("employees/bank_account_info") ?>" name="bank_account_info" method="post">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_baccount');?></h2>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="account_title"><?php echo $this->lang->line('xin_e_details_acc_title');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_acc_title');?>" name="account_title" type="text" value="" id="account_name">
          </div>
          <div class="form-group">
            <label for="account_number"><?php echo $this->lang->line('xin_e_details_acc_number');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_acc_number');?>" name="account_number" type="text" value="" id="account_number">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="bank_name"><?php echo $this->lang->line('xin_e_details_bank_name');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_bank_name');?>" name="bank_name" type="text" value="" id="bank_name">
          </div>
          <div class="form-group">
            <label for="bank_code"><?php echo $this->lang->line('xin_e_details_bank_code');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_bank_code');?>" name="bank_code" type="text" value="" id="bank_code">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label for="bank_branch"><?php echo $this->lang->line('xin_e_details_bank_branch');?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_bank_branch');?>" name="bank_branch" type="text" value="" id="bank_branch">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-primary save col-right"><?php echo $this->lang->line('xin_save');?></button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_baccount');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_bank_account" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_e_details_acc_title');?></th>
              <th><?php echo $this->lang->line('xin_e_details_acc_number');?></th>
              <th><?php echo $this->lang->line('xin_e_details_bank_name');?></th>
              <th><?php echo $this->lang->line('xin_e_details_bank_code');?></th>
              <th><?php echo $this->lang->line('xin_e_details_bank_branch');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-md-9 current-tab animated fadeInRight" id="contract" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_contracts');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_contract" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_e_details_duration');?></th>
              <th><?php echo $this->lang->line('dashboard_designation');?></th>
              <th><?php echo $this->lang->line('xin_e_details_contract_type');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="leave" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_leave');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_leave" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_e_details_contract');?></th>
              <th><?php echo $this->lang->line('xin_e_details_casual_leave');?></th>
              <th><?php echo $this->lang->line('xin_e_details_medical_leave');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="shift" style="display:none;">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_shift');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table_shift" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_e_details_date');?></th>
              <th><?php echo $this->lang->line('left_office_shift');?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="change_password" style="display:none;">
    <div class="box box-block bg-white">
      <form id="e_change_password" action="<?php echo site_url("employees/change_password");?>" name="e_change_password" method="post">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <input type="hidden" name="u_basic_info" value="UPDATE">
        <h2><strong><?php echo $this->lang->line('xin_e_details_eforce');?></strong> <?php echo $this->lang->line('header_change_password');?></h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="new_password"><?php echo $this->lang->line('xin_e_details_enpassword');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_enpassword');?>" name="new_password" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="new_password_confirm" class="control-label"><?php echo $this->lang->line('xin_e_details_ecnpassword');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_ecnpassword');?>" name="new_password_confirm" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-primary save col-right"><?php echo $this->lang->line('xin_save');?></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
