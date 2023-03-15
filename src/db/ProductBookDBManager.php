<?php
require_once('DB.php');

class ProductBookDBManager
{
    public static function create($data)
    {
        /* try { */
        $db = new DB();
        $connection = $db->getConnection();
        $stmt = $connection->prepare('INSERT INTO products(sku, name, price, type) VALUES(?, ?, ?, ?)');
        $stmt->bindParam(1, $data['sku']);
        $stmt->bindParam(2, $data['name']);
        $stmt->bindParam(3, $data['price']);
        $stmt->bindParam(4, $data['type']);
        $result = $stmt->execute();
        /* } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        } */
        if ($result === TRUE) {
            $last_id = $connection->lastInsertId();
            $connection = $db->getConnection();
            $stmt = $connection->prepare('INSERT INTO products_atribute(product_id, atribute, value) VALUES(?, "weight", ?)');
            $stmt->bindParam(1, $last_id);
            $stmt->bindParam(2, $data['weight']);
            $result = $stmt->execute();
        }
    }

}