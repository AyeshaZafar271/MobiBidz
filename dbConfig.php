<?php
// Database configuration
$env = parse_ini_file(__DIR__ . '/.env');

$dbHost     = $env['DB_HOST'];
$dbUsername  = $env['DB_USER'];
$dbPassword  = $env['DB_PASS'];
$dbName     = $env['DB_NAME'];

$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
?>
