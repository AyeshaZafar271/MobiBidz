<?php


include 'userController.php';


$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$postcode=$_POST["postcode"];


$pdo = new PDO('mysql:dbname=mobibidz', 'root', '');

$userService = new UserService($pdo, $email, $password);
$userService->setupData($pdo, $email, $password, $name, $address, $phone, $postcode);
echo $userService->insertUserAccount();

header( "refresh:2;url=index.php" );

?>