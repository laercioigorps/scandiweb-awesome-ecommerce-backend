<?php
require_once('ProductSerializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductDVDDBManager.php');
require_once('../src/models/ProductDVD.php');
require_once('validators/DecimalFieldValidator.php');
class ProductDVDSerializer extends ProductSerializer implements ModelSerializerInterface
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["size"] = new DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        ProductDVDDBManager::create($this->getCleanedData());
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
            "type_specific" => ["Size" => $instance->getSize()],
        ];
    }

    public function getInstance()
    {
        $productDVD = new ProductDVD();
        $productDVD->setSku($this->cleanedData['sku']);
        $productDVD->setName($this->cleanedData['name']);
        $productDVD->setPrice($this->cleanedData['price']);
        $productDVD->setType($this->cleanedData['type']);
        $productDVD->setSize($this->cleanedData['size']);
        return $productDVD;
    }
}