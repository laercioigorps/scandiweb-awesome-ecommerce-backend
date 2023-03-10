<?php

function getConnection()
{
    $servername = "127.0.0.1";
    $database = "products";
    $username = "root";
    $password = "password";
    $charset = "utf8mb4";
    try {
        $dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connection Okay';
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function createProductDVD($data)
{
    $con = getConnection();
    $stmt = $con->prepare('INSERT INTO product_dvd(sku, name, price, type, size ) VALUES(?, ?, ?, ?, ?)');
    $stmt->bindParam(1, $data['sku']);
    $stmt->bindParam(2, $data['name']);
    $stmt->bindParam(3, $data['price']);
    $stmt->bindParam(4, $data['type']);
    $stmt->bindParam(5, $data['size']);
    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo 'Something went wrong: ' . $e->getMessage();
    }
    return 0;
}

function createProductFurniture($data)
{
    $con = getConnection();
    $stmt = $con->prepare('INSERT INTO product_furniture(sku, name, price, type, height, width, length ) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $stmt->bindParam(1, $data['sku']);
    $stmt->bindParam(2, $data['name']);
    $stmt->bindParam(3, $data['price']);
    $stmt->bindParam(4, $data['type']);
    $stmt->bindParam(5, $data['height']);
    $stmt->bindParam(6, $data['width']);
    $stmt->bindParam(7, $data['length']);
    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo 'Something went wrong: ' . $e->getMessage();
    }
    return 0;
}

function createProductBook($data)
{
    $con = getConnection();
    $stmt = $con->prepare('INSERT INTO product_book (sku, name, price, type, weight ) VALUES(?, ?, ?, ?, ?)');
    $stmt->bindParam(1, $data['sku']);
    $stmt->bindParam(2, $data['name']);
    $stmt->bindParam(3, $data['price']);
    $stmt->bindParam(4, $data['type']);
    $stmt->bindParam(5, $data['weight']);
    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo 'Something went wrong: ' . $e->getMessage();
    }
    return 0;
}


// Converts it into a PHP object
$data = json_decode(file_get_contents('php://input'), true);
$type = $data['type'];
if ($type === 'dvd') {
    createProductDVD($data);
} else if ($type === 'furniture') {
    createProductFurniture($data);
} else if ($type === 'book') {
    createProductBook($data);
}
;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json; charset=utf-8');
http_response_code(201);