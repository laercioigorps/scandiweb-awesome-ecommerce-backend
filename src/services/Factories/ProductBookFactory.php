<?php
namespace Services\Factories;

class ProductBookFactory implements ProductModelSerializerFactoryInterface
{

    public function getModel(array $data = null): \Models\ProductBook
    {
        if ($data) {
            $model = new \Models\ProductBook(
                id: $data['id'],
                sku: $data['sku'],
                name: $data['name'],
                price: $data['price'],
                type: $data['type'],
                weight: $data['weight']
            );
        } else {
            $model = new \Models\ProductBook();
        }
        return $model;
    }

    public function getSerializer($data = null, $instance = null)
    {
        return new \Serializers\ProductBookSerializer(data: $data, instance: $instance);
    }
}