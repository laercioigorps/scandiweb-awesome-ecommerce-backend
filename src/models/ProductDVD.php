<?php

declare(strict_types=1);

namespace Models;

class ProductDVD extends Product
{
    private $size;

    public function __construct($id = null, $sku = null, $name = null, $price = null, $type = null, $size = null)
    {
        parent::__construct(id: $id, sku: $sku, name: $name, price: $price, type: $type);
        $this->setSize($size);
    }

    public function getSize()
    {
        return $this->size;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }


}