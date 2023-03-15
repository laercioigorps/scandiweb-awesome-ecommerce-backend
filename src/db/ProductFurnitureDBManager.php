<?php
require_once('DB.php');
require_once('ProductDBManager.php');

class ProductFurnitureDBManager
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
            $connection = $db->getConnection();
            $stmt = $connection->prepare('
                INSERT INTO products_atribute(product_id, atribute, value) VALUES
                (:product_id, "height", :height),
                (:product_id, "width", :width),
                (:product_id, "length", :length)'
            );

            $result = $stmt->execute([
                "product_id" => $product_id,
                "height" => $data["height"],
                "width" => $data["width"],
                "length" => $data["length"]
            ]);
        }
    }

}