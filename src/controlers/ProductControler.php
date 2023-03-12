<?php

require_once('../src/services/ProductSerializerFactory.php');
require_once('../src/services/ProductFactory.php');
require_once('../src/db/ProductDBManager.php');

class ProductControler
{
    public function create()
    {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            die();
        }

        // Converts it into a PHP object
        $data = json_decode(file_get_contents('php://input'), true);
        $serializer = ProductSerializerFactory::getProductSerializer($data);
        if ($serializer->isValid()) {
            $serializer->create();
        }

        http_response_code(201);
    }

    public function list()
    {
        $products = ProductDBManager::getAll();
        $main_list = [];
        foreach ($products as $product) {
            $serializer = ProductSerializerFactory::getProductSerializerFromProduct($product);
            $main_list[] = $serializer->getInstanceData();
        }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($main_list);
        exit();
    }
}