<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function register(string $requestMethod, string $requestUri, array $controller): self
    {
        $this->routes[$requestMethod][$requestUri] = $controller;
        
    //    var_dump($this->routes);

        return $this;
    }

    public function get(string $requestUri, array $controller): self
    {
        return $this->register('GET', $requestUri, $controller);
    }

    public function post(string $requestUri, array $controller): self
    {
        return $this->register('POST', $requestUri, $controller);
    }


    public function resolve(string $requestUri, string $requestMethod)
    {   
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$requestUri];

        if (! $action) {
            throw new RouteNotFoundException();
        }

    //    var_dump($action);
        return call_user_func($action);
    }
}