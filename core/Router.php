<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    /**
     * @param $method
     * @param $uri
     * @param $controller
     * @return Router
     */
    public function add($method, $uri, $controller): Router
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    /**
     * @param $uri
     * @param $controller
     * @return Router
     */
    public function get($uri, $controller): Router
    {
        return $this->add('GET', $uri, $controller);

    }

    /**
     * @param $uri
     * @param $controller
     * @return Router
     */
    public function post($uri, $controller): Router
    {
        return $this->add('POST', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return Router
     */
    public function delete($uri, $controller): Router
    {
        return $this->add('DELETE', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return Router
     */
    public function patch($uri, $controller): Router
    {
        return $this->add('PATCH', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return Router
     */
    public function put($uri, $controller): Router
    {
        return $this->add('PUT', $uri, $controller);
    }

    /**
     * @param $key
     * @return Router
     */
    public function only($key): Router
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
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

                Middleware::resolve($route['middleware']);

                return require base_path("/controllers/{$route['controller']}.php");
            }
        }

        return Response::abort();
    }
}