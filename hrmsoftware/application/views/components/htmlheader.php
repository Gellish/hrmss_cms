<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $favicon = base_url().'uploads/logo/favicon/'.$company[0]->favicon;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $favicon;?>" >

    <!-- Title -->
    <title><?php echo $title;?></title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/waves/waves.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/chartist/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/switchery/dist/switchery.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/clockpicker/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/Trumbowyg/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/summernote/summernote.css">
	<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/kendo/kendo.common.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/kendo/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/jquery-wizard/dist/css/wizard.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/ion.rangeSlider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>skin/css/core.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/css/xin_custom.css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>