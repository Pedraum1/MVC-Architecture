<?php

use MVC\app\Controllers\Main;
use MVC\app\Controllers\AuthController;
use MVC\app\System\Router;

return function(Router $route)
{
    $route->get('/', [Main::class,'index']);
    $route->get('/contacts', 'Contact');
    $route->post('/contacts',[Main::class,'handleContact']);

    $route->get('/login','Auth/Login');
    $route->get('/register','Auth/Register');

    $route->post('/login',[AuthController::class,'login']);
    $route->post('/register',[AuthController::class,'register']);

    $route->get('/posts', [Main::class,'posts']);
};