<?php

require_once('../src/models/ProductFurniture.php');
require_once('../src/models/ProductBook.php');
require_once('../src/models/ProductDVD.php');
require_once('DB.php');

class ProductDBManager
{
    public static function getAll(): array
    {
        $db = new DB();
        $connection = $db->getConnection();
        if ($connection) {
            $data = $connection->query('
            SELECT id, sku, name, price, type, height, width, length, null as size, null as weight FROM product_furniture Union 
            SELECT id, sku, name, price, type, null, null, null, size, null FROM product_dvd Union
            SELECT id, sku, name, price, type, null, null, null, null, weight FROM product_book;');
        }
        $products = [];
        foreach ($data as $row) {
            //echo $row;
            if ($row['type'] == 'dvd') {
                $product = new ProductDVD();
                $product->setSize($row['size']);
            } elseif ($row['type'] == 'furniture') {
                $product = new ProductFurniture();
                $product->setHeight($row['height']);
                $product->setWidth($row['width']);
                $product->setLength($row['length']);
            } elseif ($row['type'] == 'book') {
                $product = new ProductBook();
                $product->setWeight($row['weight']);
            }
            $product->setId($row['id']);
            $product->setSku($row['sku']);
            $product->setName($row['name']);
            $product->setPrice($row['price']);
            $product->setType($row['type']);

            $products[] = $product;
        }

        return $products;
    }

}