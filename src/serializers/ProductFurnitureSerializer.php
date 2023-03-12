<?php
require_once('Serializer.php');
class ProductFurnitureSerializer extends Serializer
{
    public function validate()
    {
        $this->valid = true;
        $this->cleanedData = $this->data;
    }
}