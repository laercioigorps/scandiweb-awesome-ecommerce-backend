<?php

declare(strict_types=1);

namespace Controlers;

use DB\GeneralProductsDBManager;
use Services\{Request, Response};
use \Services\Factories\ProductFactoryChooser;

class ProductControler
{
    public static function create(Request $request): Response
    {
        $factory = ProductFactoryChooser::getFactory($request->POST['type']);
        if (!$factory) {
            return new Response(data: json_encode(["errors" => ["type" => ["Please, select a valid option"]]]), status: 404);
        }
        $serializer = $factory->getSerializer(data: $request->POST);
        if ($serializer->isValid()) {
            $serializer->create();
            /* Rather, I could create the product using the factory methods, like:
            $product = $factory->getModel(data:$request->POST);
            $dbManager = $factory->getDBManager(); Not implemented;
            $dbManager->create($product); */
            return new Response(status: 201);
        }
        return new Response(data: json_encode(["errors" => $serializer->getErrors()]), status: 404);
    }

    public static function list(Request $request): Response
    {
        $products = GeneralProductsDBManager::getAll();
        $main_list = [];
        foreach ($products as $product) {
            $factory = ProductFactoryChooser::getFactory($product->getType());
            $serializer = $factory->getSerializer(instance: $product);
            $main_list[] = $serializer->getInstanceData();
        }
        return new Response(data: json_encode($main_list));
    }

    public static function massDelete(Request $request): Response
    {
        $productsId = $request->POST['products_id'];
        $products = GeneralProductsDBManager::getByIDs($productsId);
        GeneralProductsDBManager::massDelete($products);
        return new Response();
    }
}