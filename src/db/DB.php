<?php

class DB
{

    private $servername = "127.0.0.1";
    private $database = "products";
    private $username = "root";
    private $password = "password";
    private $charset = "utf8mb4";

    public function getConnection()
    {
        $dsn = "mysql:host=$this->servername;dbname=$this->database;charset=$this->charset";
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}