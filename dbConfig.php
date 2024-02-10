<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "mobibidz";

// Create database connection
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$db = new PDO('mysql:dbname=mobibidz', 'root', '');

// Check connection
//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//}
?>