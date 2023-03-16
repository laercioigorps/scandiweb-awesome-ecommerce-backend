<?php
require_once('ProductSerializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductBookDBManager.php');
require_once('../src/models/ProductBook.php');
require_once('validators/DecimalFieldValidator.php');
class ProductBookSerializer extends ProductSerializer implements ModelSerializerInterface
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

    public function getInstanceData()
    {
        $instance = $this->instance;
        return $this->data = [
            "id" => $instance->getId(),
            "sku" => $instance->getSku(),
            "name" => $instance->getName(),
            "price" => $instance->getPrice(),
            "type" => $instance->getType(),
            "type_specific" => ["Weight" => $instance->getWeight()],
        ];
    }

    public function getInstance()
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