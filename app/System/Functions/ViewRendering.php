<?php

use MVC\app\System\App;

function renderView(string $view)
{
    if(viewNotAvaliable($view))
    {
        renderErrorView(404);
        return;
    }

    include_once App::$ROOT_DIR."/app/Views/$view.php";
}

function renderErrorView(int $code)
{
    if(viewNotAvaliable($code))
    {
        echo "404 - Not Found";
        return;
    }

    include_once App::$ROOT_DIR."/app/Views/Errors/$code.php";
}

function viewNotAvaliable(string|int $view): bool
{
    if(is_string($view))
    {
        return !file_exists(App::$ROOT_DIR."/app/Views/$view.php") ;
    }

    return !file_exists(App::$ROOT_DIR."/app/Views/Errors/$view.php");
}