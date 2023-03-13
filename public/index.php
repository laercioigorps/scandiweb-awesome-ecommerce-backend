<?php
require_once('../src/controlers/ProductControler.php');
require_once('../src/services/Router.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router = new Router();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
    die();
}

$router->get('/products', function () {
    $controler = new ProductControler();
    $controler->list();
});

$router->post('/products/create', function () {
    $controler = new ProductControler();
    $controler->create();
});
$router->route($uri, $_SERVER['REQUEST_METHOD']);