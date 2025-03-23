<?php

namespace MVC\app\System;

include_once(App::$ROOT_DIR.'app/System/Functions/ViewRendering.php');

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

    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
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
            renderErrorView(404, ["error" => "Callback not founded"]);
        }

        #In case of string provided, returns view based on name provided
        if (is_string($callback))
        {
            renderView($callback);
        }

        #In case of Controller class provided, returns controller's function
        if (is_array($callback))
        {
            $controller_class = $callback[0];
            $controller_function = $callback[1];

            #Evaluating if controller and function passed are correct and matches with some Controller + public function
            if($this->isOperationAvailable($controller_class, $controller_function))
            {
                $controller_instance = new $controller_class();
                return $controller_instance->$controller_function($this->request);
            }

            renderErrorView(500, ["error" => "Controller or Function not available"]);

        }
    }

    private function isOperationAvailable(string $controller, string $function): bool
    {
        if(!class_exists($controller))
        {
            return false;
        }

        if(!is_subclass_of($controller,BaseController::class))
        {
            return false;
        }

        $controller_instance = new $controller();

        if(!is_callable([$controller_instance, $function]))
        {
            return false;
        }

        return true;
    }

}