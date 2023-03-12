<?php
require_once('Serializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductBookDBManager.php');
class ProductBookSerializer extends Serializer implements ModelSerializerInterface
{
    public function validate()
    {
        $this->valid = true;
        $this->cleanedData = $this->data;
    }

    public function create()
    {
        ProductBookDBManager::create($this->getCleanedData());
    }
}