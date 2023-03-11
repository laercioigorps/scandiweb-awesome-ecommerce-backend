<?php

require('../src/db/ProductDVDDBManager.php');
require('../src/db/ProductBookDBManager.php');
require('../src/db/ProductFurnitureDBManager.php');
require_once('../src/db/ProductDBManager.php');

class ProductControler
{
    public function create()
    {
        // Converts it into a PHP object
        $data = json_decode(file_get_contents('php://input'), true);
        $type = $data['type'];
        if ($type === 'dvd') {
            ProductDVDDBManager::create($data);
            //createProductDVD($data);
        } else if ($type === 'furniture') {
            ProductFurnitureDBManager::create($data);
        } else if ($type === 'book') {
            ProductBookDBManager::create($data);
        }
        ;
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(201);
    }

    public function list()
    {
        $products = ProductDBManager::getAll();
        $json = [];
        foreach ($products as $product) {
            if ($product->getType() == 'dvd') {
                $type_specific = [
                    "size" => $product->getSize()
                ];
            } elseif ($product->getType() == 'furniture') {
                $type_specific = [
                    "Dimentions" => $product->getHeight() . 'x' . $product->getWidth() . 'x' . $product->getLength()
                ];
            } elseif ($product->getType() == 'book') {
                $type_specific = [
                    "Weight" => $product->getWeight()
                ];
            }
            $main_list[] = [
                'id' => $product->getId(),
                'sku' => $product->getSku(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'type' => $product->getType(),
                'type_specific' => $type_specific,
            ];
        }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($main_list);
        exit();
    }
}