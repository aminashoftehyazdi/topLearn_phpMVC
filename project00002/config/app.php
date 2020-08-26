<?php
	// define some CONST for use in program
	define('APP_TITLE', 'mvc project');
	define('BASE_URL', '/My/topLearn_phpMVC/project00002');
	define('BASE_DIR', realpath((__DIR__)."/../"));
	$temporary = str_ireplace(BASE_URL,'',explode('?',$_SERVER['REQUEST_URI'])[0]);
	$temporary === "/" ? $temporary = "" : $temporary = substr($temporary,1);
	define('CURREN_ROUTE', $temporary);
	global $routes;
	$routes = [
	'get' => [],
	'post' => [],
	'put' => [],
	'delete' => [],
	];
	
	print_r($routes);
?>