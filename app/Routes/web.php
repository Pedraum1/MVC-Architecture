<?php

use MVC\app\Controllers\Main;
use MVC\app\System\Router;

return function(Router $route)
{
    $route->get('/', [Main::class,'index']);
    $route->get('/contacts', 'contact');

    $route->get('/posts', [Main::class,'posts']);
};