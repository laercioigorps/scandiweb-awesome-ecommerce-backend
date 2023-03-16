<?php
require_once('../src/controlers/ProductControler.php');
require_once('../src/services/Router.php');
require_once('../src/services/Request.php');

$request = new Request();
$router = new Router();

$router->get('/products', function ($request) {
    return ProductControler::list($request);
});

$router->post('/products/create', function ($request) {
    return ProductControler::create($request);
});

$router->post('/products/delete', function ($request) {
    return ProductControler::massDelete($request);
});

$router->route($request);