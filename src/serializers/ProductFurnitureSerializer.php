<?php

declare(strict_types=1);

namespace Serializers;

use Models\ProductFurniture;
use Serializers\Validators\DecimalFieldValidator;
use DB\ProductFurnitureDBManager;

class ProductFurnitureSerializer extends ProductSerializer
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["height"] = new DecimalFieldValidator(required: true, positive: true);
        $this->fields["width"] = new DecimalFieldValidator(required: true, positive: true);
        $this->fields["length"] = new DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        ProductFurnitureDBManager::create($this->getInstance());
    }

    public function getInstanceData()
    {
        $instance = $this->instance;
        return $this->data = [
            "id" => $instance->getId(),
            "sku" => $instance->getSku(),
            "name" => $instance->getName(),
            "price" => $instance->getPrice(),
            "type" => $instance->getType(),
            "type_specific" => ["Dimentions" => $instance->getHeight() . 'x' . $instance->getWidth() . 'x' . $instance->getLength()],
        ];
    }

    public function getInstance(): ProductFurniture
    {
        $productFurniture = new ProductFurniture(
            sku: $this->cleanedData['sku'],
            name: $this->cleanedData['name'],
            price: $this->cleanedData['price'],
            type: $this->cleanedData['type'],
            height: $this->cleanedData['height'],
            width: $this->cleanedData['width'],
            length: $this->cleanedData['length'],
        );
        return $productFurniture;
    }
}