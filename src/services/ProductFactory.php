<?php
class ProductFactory
{
    public static function getProduct($data): Product
    {
        if ($data['type'] == 'dvd') {
            $product = new ProductDVD();
            $product->setSize((float) $data['size']);
        } elseif ($data['type'] == 'furniture') {
            $product = new ProductFurniture();
            $product->setHeight((float) $data['height']);
            $product->setWidth((float) $data['width']);
            $product->setLength((float) $data['length']);
        } elseif ($data['type'] == 'book') {
            $product = new ProductBook();
            $product->setWeight((float) $data['weight']);
        }
        if (isset($data['id'])) {
            $product->setId((int) $data['id']);
        }
        $product->setSku($data['sku']);
        $product->setName($data['name']);
        $product->setPrice((float) $data['price']);
        $product->setType($data['type']);
        return $product;
    }
}