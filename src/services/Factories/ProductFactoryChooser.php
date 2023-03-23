<?php
namespace Services\Factories;

class ProductFactoryChooser
{

    public static function getFactory($type = null): ?\Services\Factories\ProductModelSerializerFactoryInterface
    {
        $factory = null;
        switch ($type) {
            case "dvd":
                $factory = new \Services\Factories\ProductDVDFactory();
                break;
            case "book":
                $factory = new \Services\Factories\ProductBookFactory();
                break;
            case "furniture":
                $factory = new \Services\Factories\ProductFurnitureFactory();
                break;
        }
        return $factory;

    }

}