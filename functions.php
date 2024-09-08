<?php
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function uriIs($uri): bool
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $uri;
}

function abort($code = 404): void
{
    $title = match ($code) {
        404 => '404 Not Found',
        500 => '500 Internal Server Error',
        default => 'Error',
    };
    http_response_code($code);

    require __DIR__ . '/views/errors/' . $code . '.view.php';

    die();
}

function route($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        $controller = $routes[$uri];
        $controller = explode('@', $controller);
        require __DIR__ . '/controllers/' . $controller[0] . '.php';
    } else {
        abort();
    }
}

function navUri($uri, $class = 'bg-gray-900 text-white'): string
{
    return uriIs($uri) ? $class : 'text-gray-300';
}