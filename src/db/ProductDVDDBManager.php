<?php
require_once('DB.php');
require_once('ProductDBManager.php');

class ProductDVDDBManager
{
    public static function create($product)
    {
        $product_id = ProductDBManager::addBasicProduct($product);

        /* } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        } */
        if ($product_id) {
            $db = new DB();
            $connection = $db->getConnection();
            $stmt = $connection->prepare('INSERT INTO products_atribute(product_id, atribute, value) VALUES(:product_id, "size", :size)');
            $result = $stmt->execute([
                "product_id" => $product_id, 
                "size" =>$product->getSize()
            ]);
        }
    }

}