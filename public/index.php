<?php
require_once('../src/controlers/ProductControler.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/products' => function () {
        $controler = new ProductControler();
        $controler->list();
    },
    '/products/create' => function () {
        $controler = new ProductControler();
        $controler->create();
    },
];

if (array_key_exists($uri, $routes)) {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
        die();
    }
    $routes[$uri]();
}
;