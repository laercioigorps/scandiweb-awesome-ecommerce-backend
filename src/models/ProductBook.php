<?php

declare(strict_types=1);

namespace Models;

class ProductBook extends Product
{
    private $weight;

    public function __construct($id = null, $sku = null, $name = null, $price = null, $type = null, $weight = null)
    {
        parent::__construct(id: $id, sku: $sku, name: $name, price: $price, type: $type);
        $this->setWeight($weight);
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}