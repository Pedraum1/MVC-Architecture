<?php

namespace MVC\app\System;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}