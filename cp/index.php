<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim([
        'debug' => true,
        'templates.path' => 'templates/'
    ]);
$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));



$authenticate = function ($app) {
    return function () use ($app) {
        if (!isset($_SESSION['UserID'])) {
            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
            $app->flash('error', 'Login required');
            $app->redirect($app->urlFor('loginuser'));
			
        }
   };
};

$app->hook('slim.before.dispatch', function() use ($app) { 
   $UserID = null;
   if (isset($_SESSION['UserID'])) {
      $UserID = $_SESSION['UserID'];
   }
   $app->view()->setData('app', $app); 
   $app->view()->setData('iUserID', $UserID);
});


$app->get('/', function() use($app) {
    $app->response->setStatus(200);
	$app->render('index.php');
}); 



include_once "adminrouting.php";

include_once "customerrouting.php";
$app->run();


?>