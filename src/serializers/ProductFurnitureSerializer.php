<?php
require_once('Serializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductFurnitureDBManager.php');
class ProductFurnitureSerializer extends Serializer implements ModelSerializerInterface
{
    public function validate()
    {
        $this->valid = true;
        $this->cleanedData = $this->data;
    }

    public function create()
    {
        ProductFurnitureDBManager::create($this->getCleanedData());
    }
}