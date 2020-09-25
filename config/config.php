<?php

// local development
$host = "localhost";
$username = "root";
$password = "";
$database = "web_marketplace_dev";

// //live development
// $host = "localhost";
// $username = "u9917584_marketplace_web_dev";
// $password = "+RSz]@HdEzWo";
// $database = "u9917584_marketplace_web_dev";

$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);

try {
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}