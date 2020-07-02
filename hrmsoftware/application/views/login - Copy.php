<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $site_lang = $this->load->helper('language');?>
<?php $lang = $site_lang->session->userdata('site_lang');?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="author" content="human resource management system">
<link rel="icon" href="" type="image/png">
<!-- Title -->
<title><?php echo $title; ?></title>

<!-- Vendor CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/themify-icons/themify-icons.css">
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/toastr/toastr.min.css">

<!-- Core CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>skin/css/core.css">
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="auth-bg">
<div class="auth">
  <div class="auth-header">
    	<nav class="navbar">
            <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
              <ul class="nav navbar-nav float-md-right">
                <li class="nav-item dropdown"> 
                <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false"> <img src="<?php echo base_url()?>skin/img/flags/<?php echo $this->Xin_model->get_selected_language_flag($lang);?>" alt="<?php echo $this->Xin_model->get_selected_language_name($lang);?>"> <?php echo $this->Xin_model->get_selected_language_name($lang);?></a>
                <div class="dropdown-menu dropdown-menu-right animated <?php echo $system[0]->animation_effect_topmenu;?>">
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/chineese')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/cn.gif" alt="Chinese"> Chinese
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/danish')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/dk.gif" alt="Danish"> Danish
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/english')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/en.gif" alt="English"> English
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/french')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/fr.gif" alt="French"> French
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/german')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/de.gif" alt="German"> German
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/greek')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/gr.gif" alt="Greek"> Greek
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/indonesian')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/id.gif" alt="Indonesian"> Indonesian
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/italian')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/ie.gif" alt="Italian"> Italian
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/japanese')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/jp.gif" alt="Japanese"> Japanese
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/polish')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/pl.gif" alt="Polish"> Polish
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/portuguese')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/pt.gif" alt="Portuguese"> Portuguese
                        </a> 
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/romanian')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/ro.gif" alt="Romanian"> Romanian
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/russian')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/ru.gif" alt="Spanish"> Russian
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/spanish')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/es.gif" alt="Spanish"> Spanish
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/turkish')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/tr.gif" alt="Spanish"> Turkish
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('dashboard/set_language/vietnamese')?>">
                            <img src="<?php echo base_url()?>skin/img/flags/vn.gif" alt="Vietnamese"> Vietnamese
                        </a>         
                    </div>
                </li>
              </ul>
            </div>
          </nav>
        <div class="mb-2"><img src="<?php echo base_url();?>uploads/logo/signin/<?php echo $company[0]->sign_in_logo;?>" title=""></div>
        <h6><?php echo $this->lang->line('xin_welcome_login_page_text');?> </h6>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form class="mb-1" method="post" name="hrm-form" id="hrm-form" data-redirect="dashboard?module=dashboard" data-form-table="login" data-is-redirect="1" action="<?php echo site_url('login/auth');?>">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="iusername" id="iusername" placeholder="Username">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <input type="password" class="form-control" name="ipassword" id="ipassword" placeholder="Password">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="float-xs-right">
                            <a class="text-white font-90" href="<?php echo site_url('forgot_password');?>"><?php echo $this->lang->line('xin_forgot_password_link');?></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-block"><?php echo $this->lang->line('xin_sign_in_button');?></button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button"  data-username="raviramsen" data-email="admin@testemail.com" data-password="testpassword" class="btn btn-block btn-success label-left login-as mb-0-25">
                            <span class="btn-label"><i class="ti-user"></i></span>
                            <?php echo $this->lang->line('xin_admin_text');?>
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn bg-warning btn-block label-left mb-0-25 login-as" data-username="williamanderson" data-email="williamanderson@testemail.com" data-password="testpassword">
                            <span class="btn-label"><i class="fa fa-users"></i></span>
                            <?php echo $this->lang->line('dashboard_single_employee');?>
                        </button>
                    </div>
                </div>
                <!--div class="row">
                    <div class="col-md-12 mb-1 mb-md-0" style="margin-top:20px;">
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <?php echo $this->lang->line('xin_demo_reset_text');?>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 offset-md-1">
                <?php if($system[0]->enable_current_year=='yes'):?><?php echo date('Y');?> <?php endif;?> © <?php echo $system[0]->footer_text;?>
                <?php if($system[0]->enable_page_rendered=='yes'):?>
                <br><?php echo $this->lang->line('xin_page_rendered_text');?> <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  $this->lang->line('xin_codeigniter_version').' <strong>' . CI_VERSION . '</strong>' : '' ?>
                <?php endif; ?>
                </div>
                </div-->
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS --> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jquery/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/tether/js/tether.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/toastr/toastr.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	toastr.options.closeButton = <?php echo $system[0]->notification_close_btn;?>;
	toastr.options.progressBar = <?php echo $system[0]->notification_bar;?>;
	toastr.options.timeOut = 3000;
	toastr.options.preventDuplicates = true;
	toastr.options.positionClass = "<?php echo $system[0]->notification_position;?>";
});
</script>
<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="<?php echo base_url();?>skin/js_module/xin_login.js"></script>
</body>
</html>