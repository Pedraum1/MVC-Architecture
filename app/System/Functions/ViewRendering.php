<?php

use MVC\app\System\App;

function renderView(string $view, array $params = []):void
{
    if(viewDontExist($view))
    {
        renderErrorView(404, ["error" => "View not founded"]);
        return;
    }
    
    foreach($params as $key => $value){
        $$key = $value;
    }

    ob_start();
    include_once App::$ROOT_DIR."/app/Views/$view.php";
}

function renderErrorView(int $code, $params = []): void
{
    
    foreach($params as $key => $value){
        $$key = $value;
    }
    
    if(viewDontExist($code))
    {
        echo "404 - Not Found";
        return;
    }

    include_once App::$ROOT_DIR."/app/Views/Errors/$code.php";
}

function viewDontExist(string|int $view): bool
{
    if(is_string($view))
    {
        return !file_exists(App::$ROOT_DIR."/app/Views/$view.php") ;
    }

    return !file_exists(App::$ROOT_DIR."/app/Views/Errors/$view.php");
}