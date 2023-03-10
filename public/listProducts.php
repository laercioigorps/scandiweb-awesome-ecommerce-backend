<?php

require('../src/db/DB.php');   

$con = getConnection();
$data = $con->query('
SELECT id, sku, name, price, type, height, width, length, null as size, null as weight FROM product_furniture Union 
SELECT id, sku, name, price, type, null, null, null, size, null FROM product_dvd Union
SELECT id, sku, name, price, type, null, null, null, null, weight FROM product_book;');
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