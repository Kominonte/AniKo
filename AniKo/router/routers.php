<?php

use App\services\Router;
use App\controllers\Authorization;

Router::page('/login','login');
Router::page('/','home');

Router::post('/auth/register', Authorization::class, 'register', false, true);

Router::enable();

?>