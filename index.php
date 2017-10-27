<?php 
require "application/router/router.php";
require "application/Controller.php";

$router = new Router($_GET['url']);
$router->get('/', function(){
 	$ctrl = new Controller();
	$ctrl->show();
 });

$router->post('/search', function(){
 	$ctrl = new Controller();
	$ctrl->traitement();
 });

$router->run(); 
?>