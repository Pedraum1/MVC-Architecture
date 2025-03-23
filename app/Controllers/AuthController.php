<?php

namespace MVC\app\Controllers;

use MVC\app\System\BaseController;
use MVC\app\System\Request;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        var_dump($request->getBody());
    }

    public function register(Request $request)
    {
        var_dump($request->getBody());
    }
}