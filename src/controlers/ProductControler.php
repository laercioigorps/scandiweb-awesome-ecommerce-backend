<?php
namespace Controlers;

class ProductControler
{
    public static function create($request)
    {
        // Converts it into a PHP object
        $serializer = \Services\ProductSerializerFactory::getProductSerializer($request->POST);
        if ($serializer->isValid()) {
            $serializer->create();
            return new \Services\Response(status: 201);
        }
        return new \Services\Response(data: json_encode(["errors" => $serializer->getErrors()]), status: 404);
    }

    public static function list($request)
    {
        $products = \DB\ProductDBManager::getAll();
        $main_list = [];
        foreach ($products as $product) {
            $serializer = \Services\ProductSerializerFactory::getProductSerializerFromProduct($product);
            $main_list[] = $serializer->getInstanceData();
        }
        return new \Services\Response(data: json_encode($main_list));
    }

    public static function massDelete($request)
    {
        $productsId = $request->POST['products_id'];
        $products = \DB\ProductDBManager::getByIDs($productsId);
        \DB\ProductDBManager::massDelete($products);
        return new \Services\Response();
    }
}