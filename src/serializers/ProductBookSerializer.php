<?php

declare(strict_types=1);

namespace Serializers;

use Models\ProductBook;
use Serializers\Validators\DecimalFieldValidator;
use DB\ProductBookDBManager;

class ProductBookSerializer extends ProductSerializer
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["weight"] = new DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        ProductBookDBManager::create($this->getInstance());
    }

    public function getInstanceData(): array
    {
        $instance = $this->instance;
        return $this->data = [
            "id" => $instance->getId(),
            "sku" => $instance->getSku(),
            "name" => $instance->getName(),
            "price" => $instance->getPrice(),
            "type" => $instance->getType(),
            "type_specific" => ["Weight" => $instance->getWeight() . "KG"],
        ];
    }

    public function getInstance(): ProductBook
    {
        $productBook = new ProductBook(
            sku: $this->cleanedData['sku'],
            name: $this->cleanedData['name'],
            price: $this->cleanedData['price'],
            type: $this->cleanedData['type'],
            weight: $this->cleanedData['weight'],
        );
        return $productBook;
    }
}