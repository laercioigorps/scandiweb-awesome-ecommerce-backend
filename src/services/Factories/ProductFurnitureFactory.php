<?php

declare(strict_types=1);

namespace Services\Factories;

use Models\ProductFurniture;
use Serializers\ProductFurnitureSerializer;

class ProductFurnitureFactory implements ProductModelSerializerFactoryInterface
{

    public function getModel(array $data = null): ProductFurniture
    {
        if ($data) {
            $model = new ProductFurniture(
                id: $data['id'],
                sku: $data['sku'],
                name: $data['name'],
                price: $data['price'],
                type: $data['type'],
                height: $data['height'],
                width: $data['width'],
                length: $data['length'],
            );
        } else {
            $model = new ProductFurniture();
        }
        return $model;
    }

    public function getSerializer($data = null, $instance = null)
    {
        return new ProductFurnitureSerializer(data: $data, instance: $instance);
    }

}