<?php
namespace Services\Factories;

class ProductFurnitureFactory implements ProductModelSerializerFactoryInterface
{

    public function getModel(array $data = null): \Models\ProductFurniture
    {
        if ($data) {
            $model = new \Models\ProductFurniture(
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
            $model = new \Models\ProductFurniture();
        }
        return $model;
    }

    public function getSerializer($data = null, $instance = null)
    {
        return new \Serializers\ProductFurnitureSerializer(data: $data, instance: $instance);
    }

}