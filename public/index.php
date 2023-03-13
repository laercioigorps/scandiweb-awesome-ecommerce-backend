<?php
require_once('../src/controlers/ProductControler.php');
require_once('../src/services/Router.php');
require_once('../src/services/Response.php');
require_once('../src/services/Request.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$request = new Request();
$router = new Router();

$router->get('/products', function () {
    $controler = new ProductControler();
    return $controler->list();
});

$router->post('/products/create', function () {
    $controler = new ProductControler();
    return $controler->create();
});
$router->route($request);