<?php
require('Product.php');

class ProductFurniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($id = null, $sku = null, $name = null, $price = null, $type = null, $height = null, $width = null, $length = null)
    {
        parent::__construct(id: $id, sku: $sku, name: $name, price: $price, type: $type);
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLength($length);
    }

    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function setWidth($width)
    {
        $this->width = $width;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }
}