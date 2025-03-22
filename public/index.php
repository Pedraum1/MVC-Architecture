<?php

use MVC\app\Controllers\Main;
use MVC\app\System\App;

require_once(__DIR__.'/../vendor/autoload.php');

$app = new App(__DIR__."/../");

$app->useRouter();
$app->run();