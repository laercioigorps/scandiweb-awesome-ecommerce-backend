<?php
namespace Services;
class ProductFactory
{
    public static function getProduct($data): \Models\Product
    {
        if ($data['type'] == 'dvd') {
            $product = new \Models\ProductDVD();
            $product->setSize((float) $data['size']);
        } elseif ($data['type'] == 'furniture') {
            $product = new \Models\ProductFurniture();
            $product->setHeight((float) $data['height']);
            $product->setWidth((float) $data['width']);
            $product->setLength((float) $data['length']);
        } elseif ($data['type'] == 'book') {
            $product = new \Models\ProductBook();
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