<?php

namespace MVC\app\System;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');

        if($position === false)
        {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function isGet(): bool
    {
        return $this->getMethod() === "get";
    }

    public function isPost(): bool
    {
        return $this->getMethod() === "post";
    }

    public function getMethod():string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody(): array
    {
        $body = [];

        return $this->sanitizeInputs($this->getMethod(), $body);
    }

    private function sanitizeInputs(string $method,array $request_body): array
    {
        switch($method)
        {
            case 'get':
                foreach($_GET as $key => $value)
                {
                    $request_body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            break;

            case 'post':
                foreach($_POST as $key => $value)
                {
                    $request_body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            break;
        }
        return $request_body;
    }
}