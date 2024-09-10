<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'index@controller',
    '/about' => 'about@controller',
    '/notes' => 'notes@controller',
    '/contact' => 'contact@controller',
];

route($uri, $routes);