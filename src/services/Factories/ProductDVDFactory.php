<?php

declare(strict_types=1);

namespace Services\Factories;

use Models\ProductDVD;
use Serializers\ProductDVDSerializer;

class ProductDVDFactory implements ProductModelSerializerFactoryInterface
{

    public function getModel(array $data = null): ProductDVD
    {
        if ($data) {
            $model = new ProductDVD(
                id: $data['id'],
                sku: $data['sku'],
                name: $data['name'],
                price: (float) $data['price'],
                type: $data['type'],
                size: $data['size']
            );
        } else {
            $model = new ProductDVD();
        }
        return $model;
    }

    public function getSerializer($data = null, $instance = null)
    {
        return new ProductDVDSerializer(data: $data, instance: $instance);
    }
}