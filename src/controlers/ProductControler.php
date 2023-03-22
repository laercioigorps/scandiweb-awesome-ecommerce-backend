<?php
namespace Controlers;

class ProductControler
{
    public static function create(\Services\Request $request): \Services\Response
    {
        $factory = \Services\Factories\ProductFactoryChooser::getFactory($request->POST['type']);
        $serializer = $factory->getSerializer(data: $request->POST);
        if ($serializer->isValid()) {
            $serializer->create();
            /* Rather, I could create the product using the factory methods, like:
            $product = $factory->getModel(data:$request->POST);
            $dbManager = $factory->getDBManager(); Not implemented;
            $dbManager->create($product); */
            return new \Services\Response(status: 201);
        }
        return new \Services\Response(data: json_encode(["errors" => $serializer->getErrors()]), status: 404);
    }

    public static function list(\Services\Request $request): \Services\Response
    {
        $products = \DB\GeneralProductsDBManager::getAll();
        $main_list = [];
        foreach ($products as $product) {
            $factory = \Services\Factories\ProductFactoryChooser::getFactory($product->getType());
            $serializer = $factory->getSerializer(instance: $product);
            $main_list[] = $serializer->getInstanceData();
        }
        return new \Services\Response(data: json_encode($main_list));
    }

    public static function massDelete(\Services\Request $request): \Services\Response
    {
        $productsId = $request->POST['products_id'];
        $products = \DB\GeneralProductsDBManager::getByIDs($productsId);
        \DB\GeneralProductsDBManager::massDelete($products);
        return new \Services\Response();
    }
}