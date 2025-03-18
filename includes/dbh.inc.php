<?php

$host = 'localhost';
$port = 3307; // Specify the custom port here
$dbname = 'cookingulam';
$dbusername = 'root';
$dbpassword = 'your_new_password';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}