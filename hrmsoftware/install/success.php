<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Message</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<style type="text/css">
.error {
	background: #ffd1d1;
	border: 1px solid #ff5858;
	padding: 4px;
}
</style>
</head>
<body style="background:#ece7e5">
<div class="container" style="margin-top:50px ">
  <div class="row">
    <div class="col-md-6 col-md-offset-4" style="margin-bottom:15px;">  </div>
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-custom">
        <div class="panel-body">
          <div class="alert alert-success" role="alert"> Successfully Installed HRM System. </div>
          <div class="well well-lg">
            <h4><strong>Admin panel Login Details</strong></h4>
            <hr/>
            <p>Please keep bellow login details to login HRM System.</p>
            <p><strong>Login: </strong>raviramsen</p>
            <p><strong>Password: </strong>testpassword</p>
            <p><strong>Note:</strong> You can change login details in admin section.</p>
            <?php    
                     $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                     $redir .= "://".$_SERVER['HTTP_HOST'];
                     $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
                     $redir = str_replace('install/','',$redir); 
                    ?>
            <a href="<?php echo $redir .'welcome' ?>" class="btn btn-success">Go to Login Page</a> </div>
          <p class="error"> For your own security. Please <strong>Delete</strong> or rename <strong>Install</strong> folder </p>
        </div>
        <div class="panel-footer">HRM Software </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>