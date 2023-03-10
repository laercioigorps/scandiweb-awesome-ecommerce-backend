<?php
require_once('DB.php');

class ProductFurnitureDBManager
{
    public static function create($data)
    {
        $db = new DB();
        $connection = $db->getConnection();
        $stmt = $connection->prepare('INSERT INTO product_furniture(sku, name, price, type, height, width, length ) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $stmt->bindParam(1, $data['sku']);
        $stmt->bindParam(2, $data['name']);
        $stmt->bindParam(3, $data['price']);
        $stmt->bindParam(4, $data['type']);
        $stmt->bindParam(5, $data['height']);
        $stmt->bindParam(6, $data['width']);
        $stmt->bindParam(7, $data['length']);
        $stmt->execute();
    }

}