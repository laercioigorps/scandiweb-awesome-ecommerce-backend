<?php
require_once('DB.php');
require_once('ProductDBManager.php');

class ProductDVDDBManager
{
    public static function create($data)
    {
        $product_id = ProductDBManager::addBasicProduct($data);

        /* } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        } */
        if ($product_id) {
            $db = new DB();
            $connection = $db->getConnection();
            $stmt = $connection->prepare('INSERT INTO products_atribute(product_id, atribute, value) VALUES(?, "size", ?)');
            $stmt->bindParam(1, $product_id);
            $stmt->bindParam(2, $data['size']);
            $result = $stmt->execute();
        }
    }

}