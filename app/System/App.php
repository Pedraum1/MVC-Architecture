<?php

namespace MVC\app\System;

class App
{
    public Router $router;
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }

    public function useRouter(): void{
        return;
    }
}