<?php

namespace MVC\app\System;

class Router
{

    protected array $routes = [];
    public Response $response;
    public Request $request;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        #In case of no route finded
        if($callback === false)
        {
            $this->response->setStatusCode(404);
            return $this->renderErrorView(404);
        }

        #In case of string provided, returns view based on name provided
        if (is_string($callback))
        {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view)
    {
        include_once App::$ROOT_DIR."/app/Views/$view.php";
    }

    private function renderErrorView(int $code)
    {
        include_once App::$ROOT_DIR."/app/Views/Errors/$code.php";
    }

}