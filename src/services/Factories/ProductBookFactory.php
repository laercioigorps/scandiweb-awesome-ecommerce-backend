<?php
namespace Services\Factories;
class ProductBookFactory implements \Services\Factories\ProductModelSerializerFactoryInterface
{

    public function getModel($data = null)
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
        return new \Serializers\ProductBookSerializer(data:$data, instance:$instance);
    }
}