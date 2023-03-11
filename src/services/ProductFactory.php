<?php
class ProductFactory
{
    public static function getProduct($data) : Product
    {
        if ($data['type'] == 'dvd') {
            $product = new ProductDVD();
            $product->setSize($data['size']);
        } elseif ($data['type'] == 'furniture') {
            $product = new ProductFurniture();
            $product->setHeight($data['height']);
            $product->setWidth($data['width']);
            $product->setLength($data['length']);
        } elseif ($data['type'] == 'book') {
            $product = new ProductBook();
            $product->setWeight($data['weight']);
        }
        $product->setId($data['id']);
        $product->setSku($data['sku']);
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setType($data['type']);

        return $product;
    }
}