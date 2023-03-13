<?php

require_once('../src/services/ProductSerializerFactory.php');
require_once('../src/services/ProductFactory.php');
require_once('../src/services/Response.php');
require_once('../src/db/ProductDBManager.php');

class ProductControler
{
    public function create()
    {
        // Converts it into a PHP object
        $data = json_decode(file_get_contents('php://input'), true);
        $serializer = ProductSerializerFactory::getProductSerializer($data);
        if ($serializer->isValid()) {
            $serializer->create();
        }
        return new Response(status: 201);

    }

    public function list()
    {

        $products = ProductDBManager::getAll();
        $main_list = [];
        foreach ($products as $product) {
            $serializer = ProductSerializerFactory::getProductSerializerFromProduct($product);
            $main_list[] = $serializer->getInstanceData();
        }
        return new Response(data: json_encode($main_list));
    }
}