<!DOCTYPE html>
<?php define('PUBLIC_ROOT',"http://thinkless.in/cp/");  ?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>App Name</title>

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

    <link href="<?= PUBLIC_ROOT ?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= PUBLIC_ROOT ?>js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= PUBLIC_ROOT ?>js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= PUBLIC_ROOT ?>js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
 <link href="<?= PUBLIC_ROOT ?>css/jquery.timepicker.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= PUBLIC_ROOT ?>css/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
 <?php 
if(!isset($_SESSION['AdminJson'])){
echo "<script>var userJson=[];</script>";
}else{
echo "<script>var userJson=".json_encode($_SESSION['AdminJson']).";</script>";
}
?>
</head>

<body class="loaded">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

 