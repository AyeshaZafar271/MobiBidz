<?php


include 'userController.php';


$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$postcode=$_POST["postcode"];

$env = parse_ini_file(__DIR__ . '/.env');
$pdo = new PDO('mysql:host=' . $env['DB_HOST'] . ';dbname=' . $env['DB_NAME'], $env['DB_USER'], $env['DB_PASS']);
$userService = new UserService($pdo, $email, $password);
$userService->setupData($pdo, $email, $password, $name, $address, $phone, $postcode);
echo $userService->insertUserAccount();

header( "refresh:2;url=index.php" );

?>