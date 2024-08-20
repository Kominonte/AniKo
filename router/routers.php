<?php

use App\services\Router;
use App\controllers\Authorization;

Router::page('/','home');
Router::page('/login','login');
Router::page('/user', 'user');

Router::post('/auth/register', Authorization::class, 'register', false, true);
Router::post('/auth/authorization', Authorization::class, 'authorization', false, true);
Router::post('/auth/logout', Authorization::class, 'logout');

Router::page('/404', 'not_found.php');

Router::enable();

?>