<?php
require_once('DB.php');
require_once('ProductDBManager.php');

class ProductBookDBManager
{
    public static function create($data)
    {
        /* try { */
        $product_id = ProductDBManager::addBasicProduct($data);
        if ($product_id) {
            $db = new DB();
            $connection = $db->getConnection();
            $stmt = $connection->prepare('INSERT INTO products_atribute(product_id, atribute, value) VALUES(?, "weight", ?)');
            $stmt->bindParam(1, $product_id);
            $stmt->bindParam(2, $data['weight']);
            $result = $stmt->execute();
        }
    }

}