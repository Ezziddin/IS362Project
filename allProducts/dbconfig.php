<?php
define("VENDOR", "All Products");

$dbtype = "mysql";
$dbname = "allproducts";
$hostname= "localhost";
$username = "root";
$password = "";

try{
    $db = new PDO("{$dbtype}:host=$hostname;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Can't connect to DB " . $e->getMessage();
}
?>