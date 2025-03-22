<?php

use MVC\app\Controllers\Main;
use MVC\app\System\App;

require_once(__DIR__.'/../vendor/autoload.php');

$app = new App(__DIR__."/../");

$app->router->get('/', [Main::class,'index']);
$app->router->get('/contacts', 'contact');

$app->router->get('/posts', [Main::class,'posts']);

$app->useRouter();
$app->run();