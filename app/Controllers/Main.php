<?php

namespace MVC\app\Controllers;

use MVC\app\System\BaseController;


class Main extends BaseController{

    public function index()
    {
        return renderView('Home');
    }

    public function posts()
    {
        return renderView('Posts');
    }

}