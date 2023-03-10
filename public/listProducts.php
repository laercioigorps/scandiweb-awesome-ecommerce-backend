<?php
require('../src/db/ProductDBManager.php');

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