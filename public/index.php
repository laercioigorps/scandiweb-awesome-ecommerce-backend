<?php
require_once('../src/services/Psr4AutoloaderClass.php');
$loader = new Services\Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('Models', '../src/models');
$loader->addNamespace('Controlers', '../src/controlers');
$loader->addNamespace('DB', '../src/db');    
$loader->addNamespace('Serializers', '../src/serializers');
$loader->addNamespace('Services', '../src/services'); 

$request = new Services\Request();
$router = new Services\Router();

$router->get('/products', function ($request) {
    return Controlers\ProductControler::list($request);
});

$router->post('/products/create', function ($request) {
    return Controlers\ProductControler::create($request);
});

$router->post('/products/delete', function ($request) {
    return Controlers\ProductControler::massDelete($request);
});

$router->route($request);