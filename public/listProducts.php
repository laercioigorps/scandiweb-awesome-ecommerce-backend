<?php

$data = array(
    [
        "sku" => "JVC200123",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type-specific" => ["Size" => '700 MB'],
    ],
    [
        "sku" => "JVC200124",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type-specific" => ["Size" => '700 MB'],
    ],
    [
        "sku" => "JVC200125",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type-specific" => ["Size" => '700 MB'],
    ],

    [
        "sku" => "GGWP0007",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type-specific" => ["Weight" => '2KG'],
    ],
    [
        "sku" => "GGWP0008",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type-specific" => ["Weight" => '2KG'],
    ],
    [
        "sku" => "GGWP0009",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type-specific" => ["Weight" => '2KG'],
    ],
    [
        "sku" => "TR120555",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type-specific" => ["Dimentions" => '24x45x15'],
    ],
    [
        "sku" => "TR120556",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type-specific" => ["Dimentions" => '24x45x15'],
    ],
    [
        "sku" => "TR120557",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type-specific" => ["Dimentions" => '24x45x15'],
    ],
);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
exit();