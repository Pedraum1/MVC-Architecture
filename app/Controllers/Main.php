<?php

namespace MVC\app\Controllers;

use MVC\app\System\BaseController;


class Main extends BaseController{

    public function index()
    {
        $params = [
            'name' => "Pedro"
        ];
        return renderView('Home', $params);
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