<?php

$app->get("/login", function () use ($app) {
  unset($_SESSION['UserID']);
   unset($_SESSION['UserName']);
   unset($_SESSION['UserJson']);
   $app->render('index.php');
})->name('loginuser');


$app->get("/logout", function () use ($app) {
   unset($_SESSION['UserID']);
   unset($_SESSION['UserName']);
    unset($_SESSION['UserJson']);
   $app->render('index.php');
});

$app->post("/setsession", function () use ($app) {
    $allPostVars = $app->request->post();
    $UserID = $allPostVars['UserID'];
    $UserName = $allPostVars['UserName'];
	$UserJson = $allPostVars['UserJson'];
	$_SESSION['UserID']=$UserID;
	$_SESSION['UserName']=$UserName;
	$_SESSION['UserJson']=$UserJson;
   $app->response->setStatus(200);
        $app->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(array("status" => "success", "code" => 1));
});
$app->get("/home", $authenticate($app), function () use ($app) {
   $app->render('dashboard.php');
})->name('customer-dashboard');

$app->get("/booking/new", $authenticate($app), function () use ($app) {
   $app->render('booknow.php');
})->name('newbooking');
?>