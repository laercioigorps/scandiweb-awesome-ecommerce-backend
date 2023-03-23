<?php

declare(strict_types=1);

namespace Serializers;

use Models\ProductDVD;
use Serializers\Validators\DecimalFieldValidator;
use DB\ProductDVDDBManager;

class ProductDVDSerializer extends ProductSerializer
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["size"] = new DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        ProductDVDDBManager::create($this->getInstance());
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
            "type_specific" => ["Size" => $instance->getSize() . " MB"],
        ];
    }

    public function getInstance(): ProductDVD
    {
        $productDVD = new ProductDVD(
            sku: $this->cleanedData['sku'],
            name: $this->cleanedData['name'],
            price: $this->cleanedData['price'],
            type: $this->cleanedData['type'],
            size: $this->cleanedData['size'],
        );
        return $productDVD;
    }
}