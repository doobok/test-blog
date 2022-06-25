<?php

namespace App;

class Request
{
    const SUPPORTED_METHODS = ['GET', 'POST'];
    private $params;
    private $method;
    private $uri;

    public function __construct()
    {
        $this->params = $this->cleanInput($_REQUEST);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function __get($name)
    {
        return (isset($this->params[$name])) ? $this->params[$name] : 0;
    }

    public function requestMethod()
    {
        if (in_array($this->method, self::SUPPORTED_METHODS)) {
            return $this->method;
        } else {
            throw new Exception(
                "Method is not provided: '{$this->method}'");
        }
    }

    public function requestUri()
    {
        return $this->uri;
    }

    private function cleanInput($data)
    {
        if (is_array($data)) {
            $cleaned = [];
            foreach ($data as $key => $value) {
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }

}