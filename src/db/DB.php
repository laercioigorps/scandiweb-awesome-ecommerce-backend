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
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

}