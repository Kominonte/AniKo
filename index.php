<?php

session_start();

use	App\services\App;

	require_once __DIR__ . "/vendor/autoload.php";	//Подключаем autoload
	App::start();
	require_once __DIR__ . "/router/routers.php";   //Подключаем список роутов
	
	// \App\services\Router::test();
	// var_dump($_GET['q']);
