<?php

require_once('Product.php');

class ProductDVD extends Product
{
    private int $size;

    public function getSize()
    {
        return $this->size;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }


}