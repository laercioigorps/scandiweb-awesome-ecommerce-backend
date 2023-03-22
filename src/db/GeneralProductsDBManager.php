<?php
namespace DB;

class GeneralProductsDBManager
{

    private static function transformAtributeLinesToColumns($data): array
    {
        $productTable = [];
        $currentproductID = null;
        $currentproduct = null;

        foreach ($data as $row) {
            if ($row['id'] != $currentproductID) {
                if ($currentproduct) {
                    $productTable[] = $currentproduct;
                }
                $currentproduct = [
                    "id" => $row['id'],
                    "sku" => $row['sku'],
                    "name" => $row['name'],
                    "price" => $row['price'],
                    "type" => $row['type'],
                ];
                $currentproductID = $row['id'];
            }
            $currentproduct[$row['atribute']] = $row['value'];
        }
        if ($data->rowCount() > 0) {
            $productTable[] = $currentproduct;
        }
        return $productTable;
    }

    public static function isValidNewSKU(string $sku): bool
    {
        $db = new DB();
        $connection = $db->getConnection();

        $sth = $connection->prepare('
            select products.id from products as products where products.sku=?;'
        );
        $sth->execute([$sku]);
        $products = $sth->fetchAll();
        return count($products) === 0;
    }
    public static function getAll(): array
    {
        $db = new DB();
        $connection = $db->getConnection();
        $data = $connection->query('
            SELECT p.id, p.sku, p.name, p.price, p.type, a.atribute, a.value 
            FROM `products` as p left join products_atribute as a on p.id=a.product_id;');
        $productTable = \DB\GeneralProductsDBManager::transformAtributeLinesToColumns($data);
        $products = [];
        foreach ($productTable as $product) {
            $factory = \Services\Factories\ProductFactoryChooser::getFactory($product['type']);
            $products[] = $factory->getModel(data: $product);
        }
        return $products;
    }

    public static function getByIDs(array $productIds): array
    {
        $db = new DB();
        $connection = $db->getConnection();
        $data = $connection->query(
            'SELECT p.id, p.sku, p.name, p.price, p.type, a.atribute, a.value 
            FROM `products` as p left join products_atribute as a on p.id=a.product_id 
            where p.id in (' . implode(',', array_map('intval', $productIds)) . ');'
        );
        $productTable = GeneralProductsDBManager::transformAtributeLinesToColumns($data);
        $products = [];
        foreach ($productTable as $product) {
            $factory = \Services\Factories\ProductFactoryChooser::getFactory($product['type']);
            $products[] = $factory->getModel(data: $product);
        }
        return $products;
    }

    public static function massDelete(array $products)
    {
        $productsId = [];
        foreach ($products as $product) {
            $productsId[] = $product->getId();
        }
        $db = new DB();
        $connection = $db->getConnection();
        $connection->query(
            'DELETE FROM `products` where id in (' . implode(',', array_map('intval', $productsId)) . ');'
        );
    }

    public static function addBasicProduct(\Models\Product $product): int
    {
        $db = new DB();
        $connection = $db->getConnection();
        $stmt = $connection->prepare('INSERT INTO products(sku, name, price, type) VALUES(:sku, :name, :price, :type)');
        $result = $stmt->execute([
            "sku" => $product->getSku(),
            "name" => $product->getName(),
            "price" => $product->getPrice(),
            "type" => $product->getType()
        ]);
        if ($result === TRUE) {
            return $connection->lastInsertId();
        }
        return false;
    }

}