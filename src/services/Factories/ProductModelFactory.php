<?php
namespace Services\Factories;

class ProductModelFactory
{

    public static function getFactory($type)
    {

        $factories = [
            "dvd" => new \Services\Factories\ProductDVDFactory(),
            "book" => new \Services\Factories\ProductBookFactory(),
            "furniture" => new \Services\Factories\ProductFurnitureFactory(),
        ];
        return $factories[$type];
    }

}