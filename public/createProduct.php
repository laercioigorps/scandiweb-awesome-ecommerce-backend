<?php
require('../src/db/ProductDVDDBManager.php');
require('../src/db/ProductBookDBManager.php');
require('../src/db/ProductFurnitureDBManager.php');

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