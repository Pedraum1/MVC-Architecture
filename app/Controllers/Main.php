<?php

namespace MVC\app\Controllers;

use MVC\app\System\BaseController;
use MVC\app\System\Request;

class Main extends BaseController{

    public function index()
    {
        $params = [
            'name' => "Sara"
        ];
        return renderView('Home', $params);
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        var_dump($body);
    }

    public function posts()
    {
        $posts_data = [
            'posts' => [
                [
                    'title' => 'new User in the site',
                    'user' => 'George',
                    'description' => "Hey there folks, I'm a new user in this site"
                ],
                [
                    'title' => 'new User in the site',
                    'user' => 'David',
                    'description' => "Hey there folks, I'm a new user in this site"
                ],
            ]
        ];
        return renderView('Posts', $posts_data);
    }

}