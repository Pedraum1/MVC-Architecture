<?php

use MVC\app\System\App;

require_once(__DIR__.'/../vendor/autoload.php');

$app = new App(__DIR__."/..");

$app->router->get('/', function(){
    echo "Hello World";
});
$app->router->get('/contacts', 'contact');

$app->useRouter();
$app->run();