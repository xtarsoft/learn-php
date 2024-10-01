<?php

use Core\Response;

/**
 * @param $value
 * @return void
 */
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

/**
 * @param string $path
 * @return string
 */
function base_path(string $path = ''): string
{
    $rootPath = dirname(__DIR__, 1);

    if ($path) {
        return $rootPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
    return $rootPath;
}

/**
 * @param string $path
 * @return string
 */
function view_path(string $path = ''): string
{
    $viewPath = base_path('views');

    if ($path) {
        return $viewPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
    return $viewPath;
}

/**
 * @param string $name
 * @param array $attributes
 * @return int
 */
function view(string $name = 'welcome', array $attributes = []): int
{
    $name = explode('.', $name);
    $viewPath = view_path();

    if (count($name) > 1) {
        $ignoreLast = array_slice($name, 0, -1);
        $joinPath = implode(DIRECTORY_SEPARATOR, $ignoreLast);

        $viewPath = view_path($joinPath);
    }

    $file = end($name). '.view.php';
    $viewPath = $viewPath . DIRECTORY_SEPARATOR . ltrim($file, DIRECTORY_SEPARATOR);

    if (file_exists($viewPath)) {

        extract($attributes);

        require $viewPath;
    } else {
        Response::abort();
    }
    return 0;
}

/**
 * @param $uri
 * @return bool
 */
function uriIs($uri): bool
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $uri;
}

/**
 * @param $condition
 * @param int $status
 * @return void
 */
function auth($condition, int $status = Response::FORBIDDEN): void
{
    if ($condition) {
        Response::abort($status);

    }
    return;
}

/**
 * @param $uri
 * @param $routes
 * @return void
 */
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

/**
 * @param $uri
 * @param string $class
 * @return string
 */
function navUri($uri, string $class = 'bg-gray-900 text-white'): string
{
    return uriIs($uri) ? $class : 'text-gray-300';
}