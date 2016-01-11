<!DOCTYPE html>
<?php define('PUBLIC_ROOT',"http://thinkless.in/cp/");  ?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
 
  <title>Login</title>

  <!-- Favicons-->
  <link rel="icon" href="<?= PUBLIC_ROOT ?>images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?= PUBLIC_ROOT ?>images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?= PUBLIC_ROOT ?>images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->
<link rel="stylesheet" href="<?= PUBLIC_ROOT ?>css/toastr/toastr.min.css" type="text/css">

  <!-- CORE CSS-->
  
  <link href="<?= PUBLIC_ROOT ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= PUBLIC_ROOT ?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= PUBLIC_ROOT ?>css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?= PUBLIC_ROOT ?>css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= PUBLIC_ROOT ?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
   <link href="<?= PUBLIC_ROOT ?>css/toastr/toastr.min.css" type="text/css" rel="stylesheet"> 		
</head>

<body class="cyan loaded">
 <div class="card-panel teal amber accent-2 center"  id="resultSignin" style="display:none;">
		 
		 </div>
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?= PUBLIC_ROOT ?>images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Login to see in action</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
       <!-- <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>-->
        <div class="row">
          <div class="input-field col s12">
            <a href="#" onclick="validateUser();" class="btn waves-effect waves-light col s12">Login</a>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="#" id="registerClick">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#">Forgot password ?</a></p>
          </div>          
        </div>
		<div class="row">
		
			</div>
      </form>
    </div>
  </div>
  <div id="register-page" class="row" style="display:none;">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?= PUBLIC_ROOT ?>images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">All fields are required</p>
          </div>
        </div>
		 <div class="row margin">
         <div class="input-field col s12">
         <input id="customerCompany" type="text" class="validate">
         <label for="customerCompany">Company Name</label>
         </div>
        </div>
		<div class="row margin">
         <div class="input-field col s12">
         <input id="customerName" type="text" class="validate">
         <label for="customerName">Full Name</label>
         </div>
        </div>
        <div class="row margin">
         <div class="input-field col s12">
         <input id="customerEmail" type="text" class="validate">
         <label for="customerEmail">Email</label>
         </div>
        </div>
		 <div class="row margin">
         <div class="input-field col s12">
         <input id="customerPassword" type="password" class="validate">
         <label for="customerPassword">Password</label>
         </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="button" onclick="registercustomer();" class="btn waves-effect waves-light col s12">Register</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="#" id="loginClick">Login</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#">Forgot password ?</a></p>
          </div>          
        </div>
		<div class="row">
		
			</div>
      </form>
    </div>
  </div>
<div id="loadingDiv" class="modal">
                 <div class="modal-body">
			<span> <i  style="font-size:20px;"class="fa fa-cog fa-spin"></i> &nbsp; Loading...</span>
			</div>
                </div>


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/customer/app.js"></script>
	<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/customer/login.js"></script>
</body>

</html>