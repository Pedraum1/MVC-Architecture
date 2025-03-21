<?php

use MVC\app\System\App;

require_once('../vendor/autoload.php');

$app = new App();

$app->router->get('/', function(){
    echo "Hello World";
});
$app->router->get('/contacts', function(){
    echo "Contacts";
});

$app->useRouter();
$app->run();