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
        return;
    }

}