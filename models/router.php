<?php

class Router
{
    private $routes = [];

    public static function loads($file)
    {
        $router = new static;
        require $file;
        return $router;
    }


    public function addRoute($routes)
    {
        $this->routes = $routes;
    }

    public function getRoute($path)
    {
        return $this->routes[$path] ?? null;
    }
}
