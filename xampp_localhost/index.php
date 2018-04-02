<?php
	require_once('httpful.phar');

	require_once('router.php');

	require_once('controllers/BaseController.php');
	require_once('controllers/HomeController.php');
	
	require_once('models/lumen.php');	
	require_once('models/RabbitMQ.php');
	require_once('models/db.php');


	$router = new Router($_SERVER, $_GET, $_POST);

	$router->new_route('/', new HomeController());
	$router->serve();
	
 ?>
