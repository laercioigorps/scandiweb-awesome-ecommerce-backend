<?php

require_once('../src/services/ProductSerializerFactory.php');
require_once('../src/services/ProductFactory.php');
require_once('../src/services/Response.php');
require_once('../src/db/ProductDBManager.php');

class ProductControler
{
    public static function create($request)
    {
        // Converts it into a PHP object
        $serializer = ProductSerializerFactory::getProductSerializer($request->POST);
        if ($serializer->isValid()) {
            $serializer->create();
        }
        return new Response(status: 201);

    }

    public static function list($request)
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