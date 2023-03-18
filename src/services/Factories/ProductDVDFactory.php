<?php
namespace Services\Factories;
class ProductDVDFactory implements \Services\Factories\ProductModelSerializerFactoryInterface
{

    public function getModel($data = null)
    {
        if ($data) {
            $model = new \Models\ProductDVD(
            id: $data['id'],
            sku: $data['sku'],
            name: $data['name'],
            price: $data['price'],
            type: $data['type'],
            size: $data['size']
            );
        } else {
            $model = new \Models\ProductDVD();
        }
        return $model;
    }

    public function getSerializer($data = null, $instance = null)
    {
        return new \Serializers\ProductDVDSerializer(data:$data, instance:$instance);
    }
}