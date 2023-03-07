<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/products' => 'listProducts.php',
    '/products/create' => 'createProduct.php',
];

if (array_key_exists($uri, $routes)) {
    require($routes[$uri]);
};