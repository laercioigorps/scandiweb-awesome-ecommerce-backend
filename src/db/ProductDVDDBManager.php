<?php
require_once('DB.php');

class ProductDVDDBManager
{
    public static function create($data)
    {
        $db = new DB();
        $connection = $db->getConnection();
        $stmt = $connection->prepare('INSERT INTO product_dvd(sku, name, price, type, size ) VALUES(?, ?, ?, ?, ?)');
        $stmt->bindParam(1, $data['sku']);
        $stmt->bindParam(2, $data['name']);
        $stmt->bindParam(3, $data['price']);
        $stmt->bindParam(4, $data['type']);
        $stmt->bindParam(5, $data['size']);
        $stmt->execute();
    }

}