<?php
    $message="";
    if(isset($_REQUEST["message"]))
    {
            $message = $_REQUEST["message"];
    }
	//echo hash('crc32b', 'sai');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RMSS login Page</title>
	<!-- Base Styles -->

	<!-- AnimationCSS -->
	<link rel="stylesheet" href="css/animate.min.css">
	<link href="css/animate.css" rel="stylesheet" >

	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Theme Styles -->
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" href="css/gs.min.css">
	<link rel="stylesheet" href="css/gs-skins.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/blue.css">
	<!-- Fontawesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
.form-control {
	display: block;
	width: 100%;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
		.errorClass { border:  1px solid red; }
</style>
	</head>

	<body class="hold-transition login-page">
<div class="login-box">
      <div class="login-logo"> <a href="../../index2.html"><b>RMSS</b>Login</a> </div>
      <div class="login-box-body">
          <?php 
            if($message != "")
            {
          
                echo $message; 
            }
            ?>
    <p class="login-box-msg"><strong>Sign in to start your session</strong></p>
    <form  method="post" action="validateLogin.php">
          <div class="form-group has-feedback">
        <input type="email" id="username" name = "email" class="form-control" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Email Address'" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
          <div class="form-group has-feedback">
        <input type="password" id="password" name = "password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Password'" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
          <div class="row">
        <div class="col-xs-8">
             <!-- <div class="checkbox icheck">
            	<label class=""> <input type="checkbox"><strong>Remember Me</strong> </label>
         	 </div>-->
        </div>
        <div class="col-xs-12">
              <button id="submit" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
        </form>
        
    </div>
    </div>
		
		<div class="alert aleert-su fade">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Alert!</strong> Here is my message..
    </div>
		
		
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/icheck.min.js"></script> 


</body>
</html>
