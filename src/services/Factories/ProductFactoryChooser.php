<?php

declare(strict_types=1);

namespace Services\Factories;

class ProductFactoryChooser
{

    public static function getFactory($type = null): ?ProductModelSerializerFactoryInterface
    {
        $factory = null;
        switch ($type) {
            case "dvd":
                $factory = new ProductDVDFactory();
                break;
            case "book":
                $factory = new ProductBookFactory();
                break;
            case "furniture":
                $factory = new ProductFurnitureFactory();
                break;
        }
        return $factory;

    }

}