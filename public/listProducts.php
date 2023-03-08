<?php

$data = array(
    [
        "id" => "1",
        "sku" => "JVC200123",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type_specific" => ["Size" => '700 MB'],
    ],
    [
        "id" => "2",
        "sku" => "JVC200123",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type_specific" => ["Size" => '700 MB'],
    ],
    [
        "id" => "3",
        "sku" => "JVC200124",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type_specific" => ["Size" => '700 MB'],
    ],
    [
        "id" => "4",
        "sku" => "JVC200125",
        "name" => "Acme DISK",
        "price" => "1.00",
        "type" => "DVD",
        "type_specific" => ["Size" => '700 MB'],
    ],
    [
        "id" => "5",
        "sku" => "GGWP0007",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type_specific" => ["Weight" => '2KG'],
    ],
    [
        "id" => "6",
        "sku" => "GGWP0007",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type_specific" => ["Weight" => '2KG'],
    ],
    [
        "id" => "7",
        "sku" => "GGWP0008",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type_specific" => ["Weight" => '2KG'],
    ],
    [
        "id" => "8",
        "sku" => "GGWP0009",
        "name" => "War and Peace",
        "price" => "20.00",
        "type" => "Book",
        "type_specific" => ["Weight" => '2KG'],
    ],
    [
        "id" => "9",
        "sku" => "TR120555",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type_specific" => ["Dimentions" => '24x45x15'],
    ],
    [
        "id" => "10",
        "sku" => "TR120556",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type_specific" => ["Dimentions" => '24x45x15'],
    ],
    [
        "id" => "11",
        "sku" => "TR120557",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type_specific" => ["Dimentions" => '24x45x15'],
    ],
    [
        "id" => "12",
        "sku" => "TR120557",
        "name" => "Chair",
        "price" => "40.00",
        "type" => "Furniture",
        "type_specific" => ["Dimentions" => '24x45x15'],
    ],
);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
exit();