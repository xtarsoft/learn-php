<?php

use Core\Router;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Router();

$router->get('/','index');
$router->get('/about','about');

//Note Controller
$router->get('/notes','notes/index'); //R(Read All)
$router->get('/note','notes/show'); //R(Read {id})
$router->get('/notes/create','notes/create'); //Get Create Form
$router->post('/notes/store','notes/store'); // C(Create)
$router->get('/notes/edit','notes/edit'); //Get Edit Form
$router->patch('/notes/update','notes/update'); //U(Update)
$router->delete('/notes/destroy','notes/destroy');

$router->get('/contact','contact');

$router->route($uri, $method);
