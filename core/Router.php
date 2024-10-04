<?php

namespace Core;

class Router
{
    protected $routes = [];

    /**
     * @param $method
     * @param $uri
     * @param $controller
     * @return void
     */
    public function add($method, $uri, $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function get($uri, $controller): void
    {
        $this->add('GET', $uri, $controller);

    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function post($uri, $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function delete($uri, $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function patch($uri, $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function put($uri, $controller): void
    {
        $this->add('PUT', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $method
     * @return mixed
     */
    public function route($uri, $method): mixed
    {
        foreach ($this->routes as $route)
        {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path("/controllers/{$route['controller']}.php");
            }
        }

        return Response::abort();
    }
}