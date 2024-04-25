<?php

$db = "mysql:host=localhost;dbname=landb";
$dbusername = "root";
$dbpwd = "";

try {
    $pdo = new PDO($db, $dbusername, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
