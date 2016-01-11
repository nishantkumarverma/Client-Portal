<?php

$app->get("/private/about", $authenticate($app), function () use ($app) {
   $app->render('privateAbout.php');
})->name('afterlogin');

$authenticateAdmin = function ($app) {
    return function () use ($app) {
        if (!isset($_SESSION['AdminID'])) {
            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
            $app->flash('error', 'Login required');
            $app->redirect($app->urlFor('loginpage'));
			
        }
   };
};

$app->get('/admin(/)', function() use($app) {
unset($_SESSION['AdminID']);
   unset($_SESSION['AdminName']);
   unset($_SESSION['AdminJson']);
    unset($_SESSION['AdminRoleID']);
   
	$app->render('admin/index.php');
})->name('loginpage'); 

$app->get('/admin/home(/)', function() use($app) {
    
	$app->render('admin/dashboard.php');
})->name('dashboard'); 

$app->post("/admin/setadminsession(/)", function () use ($app) {
    $allPostVars = $app->request->post();
    $AdminID = $allPostVars['AdminID'];
    $AdminName = $allPostVars['AdminName'];
	 $AdminJson = $allPostVars['AdminJson'];
	  $AdminRoleID = $allPostVars['AdminRoleID'];
	$_SESSION['AdminID']=$AdminID;
	$_SESSION['AdminName']=$AdminName;
	$_SESSION['AdminJson']=$AdminJson;
	$_SESSION['AdminRoleID']=$AdminRoleID;
   $app->response->setStatus(200);
        $app->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(array("status" => "success", "code" => 1));
});

$app->get('/admin/roles(/)',$authenticateAdmin($app), function() use($app) {
	$app->render('admin/adminrole.php');
})->name('roles'); 
$app->get('/admin/users(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/admin.php');
})->name('adminusers'); 
$app->get('/admin/location(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/location.php');
})->name('location');

$app->get('/admin/location/category(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/category.php');
})->name('category');

$app->get('/admin/timeslot(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/timeslot.php');
})->name('timeslot');

$app->get('/admin/price(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/pricing.php');
})->name('price-setting');
$app->get('/admin/customer(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/customer.php');
})->name('customer');
$app->get('/admin/bookings(/)', $authenticateAdmin($app), function() use($app) {
	$app->render('admin/bookings.php');
})->name('bookings');
?>