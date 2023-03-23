<?php
namespace Services\Factories;

class ProductFactoryChooser
{

    public static function getFactory($type = null): ?\Services\Factories\ProductModelSerializerFactoryInterface
    {
        $serializer = null;
        switch ($type) {
            case "dvd":
                $serializer = new \Services\Factories\ProductDVDFactory();
                break;
            case "book":
                $serializer = new \Services\Factories\ProductBookFactory();
                break;
            case "furniture":
                $serializer = new \Services\Factories\ProductFurnitureFactory();
                break;
        }
        return $serializer;

    }

}