<?php

declare(strict_types=1);

namespace Services\Factories;

use Models\ProductBook;
use Serializers\ProductBookSerializer;

class ProductBookFactory implements ProductModelSerializerFactoryInterface
{

    public function getModel(array $data = null): ProductBook
    {
        if ($data) {
            $model = new ProductBook(
                id: $data['id'],
                sku: $data['sku'],
                name: $data['name'],
                price: $data['price'],
                type: $data['type'],
                weight: $data['weight']
            );
        } else {
            $model = new ProductBook();
        }
        return $model;
    }

    public function getSerializer($data = null, $instance = null)
    {
        return new ProductBookSerializer(data: $data, instance: $instance);
    }
}