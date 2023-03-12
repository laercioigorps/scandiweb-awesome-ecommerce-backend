<?php
require_once('Serializer.php');
class ProductDVDSerializer extends Serializer
{
    public function validate()
    {
        $this->valid = true;
        $this->cleanedData = $this->data;
    }
}