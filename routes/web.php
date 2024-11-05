<?php

use Core\Router;

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Router();

$router->get('/register','registration/create');
$router->post('/register','registration/store');

$router->post('/login','auth/login');
$router->get('/logout','auth/logout');

$router->get('/','index');
$router->get('/about','about');

//Note Controller
$router->get('/notes','notes/index');
$router->get('/note','notes/show');
$router->get('/notes/create','notes/create');
$router->post('/notes/store','notes/store');
$router->get('/notes/edit','notes/edit');
$router->patch('/notes/update','notes/update');
$router->delete('/notes/destroy','notes/destroy');

$router->get('/contact','contact');

$router->route($uri, $method);
