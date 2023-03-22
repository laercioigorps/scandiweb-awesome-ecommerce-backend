<?php
namespace DB;

class ProductFurnitureDBManager
{
    public static function create($product)
    {
        $product_id = \DB\GeneralProductsDBManager::addBasicProduct($product);

        /* } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        } */
        if ($product_id) {
            $db = new \DB\DB();
            $connection = $db->getConnection();
            $stmt = $connection->prepare('
                INSERT INTO products_atribute(product_id, atribute, value) VALUES
                (:product_id, "height", :height),
                (:product_id, "width", :width),
                (:product_id, "length", :length)'
            );

            $result = $stmt->execute([
                "product_id" => $product_id,
                "height" => $product->getHeight(),
                "width" => $product->getWidth(),
                "length" => $product->getLength(),
            ]);
        }
    }

}