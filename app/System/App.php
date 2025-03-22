<?php

namespace MVC\app\System;

class App
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;

    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function useRouter(): void{
        $generate_routes = require_once(self::$ROOT_DIR.'app/Routes/web.php');
        $generate_routes($this->router);
    }

}