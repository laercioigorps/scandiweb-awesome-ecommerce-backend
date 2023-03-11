<?php

require_once('../src/models/ProductFurniture.php');
require_once('../src/models/ProductBook.php');
require_once('../src/models/ProductDVD.php');
require_once('../src/services/ProductFactory.php');
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
            $products[] = ProductFactory::getProduct($row);
        }

        return $products;
    }

}