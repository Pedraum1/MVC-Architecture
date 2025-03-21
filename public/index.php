<?php

use MVC\app\Controllers\Controller;

require_once('../vendor/autoload.php');
echo APP_NAME;

$a = new Controller;
echo "<br>";
echo $a->test();