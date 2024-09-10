<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function base_path($path = ''): string
{
    $rootPath = dirname(__DIR__,1);

    if ($path) {
        return $rootPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
    return $rootPath;
}

function view_path($path = ''): string
{
    $viewPath = base_path('views');

    if ($path) {
        return $viewPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
    return $viewPath;
}

function view($file = 'index',$options = ''): string
{
    $file = $file . '.view.php';
    $viewPath = view_path($options);
    return $viewPath . DIRECTORY_SEPARATOR . ltrim($file, DIRECTORY_SEPARATOR);
}

function uriIs($uri): bool
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $uri;
}
function auth($condition,$status = Response::FORBIDDEN): void
{
    if ($condition) {
        Response::abort($status);

    }
    return;
}
function route($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        $controller = $routes[$uri];
        $controller = explode('@', $controller);
        require base_path("/controllers/{$controller[0]}.php");
    } else {
        Response::abort();
    }
}

function navUri($uri, $class = 'bg-gray-900 text-white'): string
{
    return uriIs($uri) ? $class : 'text-gray-300';
}