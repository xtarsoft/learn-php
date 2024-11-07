<?php

use Core\Router;

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Router();

$router->get('/register','registration/create')->only('guest');
$router->post('/register','registration/store')->only('guest');

$router->post('/login','auth/login')->only('guest');
$router->get('/logout','auth/logout')->only('auth');

$router->get('/','index');
$router->get('/about','about')->only('auth');

//Note Controller
$router->get('/notes','notes/index')->only('auth');
$router->get('/note','notes/show')->only('auth');
$router->get('/notes/create','notes/create')->only('auth');
$router->post('/notes/store','notes/store')->only('auth');
$router->get('/notes/edit','notes/edit')->only('auth');
$router->patch('/notes/update','notes/update')->only('auth');
$router->delete('/notes/destroy','notes/destroy')->only('auth');

$router->get('/contact','contact')->only('auth');

$router->route($uri, $method);
