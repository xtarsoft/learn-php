<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'index@controller',
    '/about' => 'about@controller',
    '/notes' => 'notes/index@controller',
    '/note' => 'notes/show@controller',
    '/notes/create' => 'notes/create@controller',
    '/notes/store' => 'notes/store@controller',
    '/notes/destroy' => 'notes/destroy@controller',
    '/contact' => 'contact@controller',
];

route($uri, $routes);