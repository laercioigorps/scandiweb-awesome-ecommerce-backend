<?php
require_once('Serializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductDVDDBManager.php');
class ProductDVDSerializer extends Serializer implements ModelSerializerInterface
{
    public function validate()
    {
        $this->valid = true;
        $this->cleanedData = $this->data;
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
}