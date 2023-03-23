<?php

declare(strict_types=1);

namespace DB;
use Models\Product;

class ProductDVDDBManager
{
    public static function create(Product $product)
    {
        $product_id = GeneralProductsDBManager::addBasicProduct($product);

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
                "size" => $product->getSize()
            ]);
        }
    }

}