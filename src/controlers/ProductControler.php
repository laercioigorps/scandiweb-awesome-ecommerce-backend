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
        $data = ProductDBManager::getAll();
        $main_list = [];
        foreach ($data as $row) {
            //echo $row;
            if ($row['type'] == 'dvd') {
                $type_specific = [
                    "size" => $row['size']
                ];
            } elseif ($row['type'] == 'furniture') {
                $type_specific = [
                    "Dimentions" => $row['height'] . 'x' . $row['width'] . 'x' . $row['length']
                ];
            } elseif ($row['type'] == 'book') {
                $type_specific = [
                    "Weight" => $row['weight']
                ];
            }
            $main_list[] = [
                'id' => $row['id'],
                'sku' => $row['sku'],
                'name' => $row['name'],
                'price' => $row['price'],
                'type' => $row['type'],
                'type_specific' => $type_specific,
            ];
        }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($main_list);
        exit();
    }
}