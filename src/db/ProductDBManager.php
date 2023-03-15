<?php

require_once('../src/models/ProductFurniture.php');
require_once('../src/models/ProductBook.php');
require_once('../src/models/ProductDVD.php');
require_once('../src/services/ProductFactory.php');
require_once('DB.php');

class ProductDBManager
{

    private static function transformAtributeLinesToColumns($data)
    {
        $productTable = [];
        $currentproductID = null;
        $currentproduct = null;

        foreach ($data as $row) {
            if ($row['id'] != $currentproductID) {
                if ($currentproduct) {
                    $productTable[] = $currentproduct;
                }
                $currentproduct = [
                    "id" => $row['id'],
                    "sku" => $row['sku'],
                    "name" => $row['name'],
                    "price" => $row['price'],
                    "type" => $row['type'],
                ];
                $currentproductID = $row['id'];
            }
            $currentproduct[$row['atribute']] = $row['value'];
            //$products[] = ProductFactory::getProduct($row);
        }
        if ($data->rowCount() > 0) {
            $productTable[] = $currentproduct;
        }
        return $productTable;
    }

    public static function isValidNewSKU($sku)
    {
        $db = new DB();
        $connection = $db->getConnection();

        $sth = $connection->prepare('
            select products.id from products as products where products.sku=?;'
        );
        $sth->execute([$sku]);
        $products = $sth->fetchAll();
        return count($products) === 0;
    }
    public static function getAll(): array
    {
        $db = new DB();
        $connection = $db->getConnection();
        $data = $connection->query('
            SELECT p.id, p.sku, p.name, p.price, p.type, a.atribute, a.value 
            FROM `products` as p left join products_atribute as a on p.id=a.product_id;');
        $productTable = ProductDBManager::transformAtributeLinesToColumns($data);
        $products = [];

        foreach ($productTable as $product) {
            $products[] = ProductFactory::getProduct($product);
        }


        return $products;
    }

}