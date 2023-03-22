<?php
namespace DB;

class ProductBookDBManager
{
    public static function create($product)
    {
        /* try { */
        $product_id = GeneralProductsDBManager::addBasicProduct($product);
        if ($product_id) {
            $db = new DB();
            $connection = $db->getConnection();
            $stmt = $connection->prepare('INSERT INTO products_atribute(product_id, atribute, value) VALUES(?, "weight", ?)');
            $result = $stmt->execute([$product_id, $product->getWeight()]);
        }
    }

}