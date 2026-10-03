<?php

include 'userController.php';


$username=$_POST["username"];
$password=$_POST["password"];

echo $username;

echo $password;

  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }




$env = parse_ini_file(__DIR__ . '/.env');
$pdo = new PDO('mysql:host=' . $env['DB_HOST'] . ';dbname=' . $env['DB_NAME'], $env['DB_USER'], $env['DB_PASS']);


$userService = new UserService($pdo, $_POST['username'], $_POST['password']);

if ($user_id = $userService->login()) {
    echo 'Logged it as user id: '.$user_id;
    $userData = $userService->getUser();
	
	$_SESSION['user_id']=$user_id;
	$_SESSION["user_fullname"]=$userData['Name'];
	$_SESSION['message'] ="";
	$_SESSION["username_session"]=$username;
	$_SESSION["user_email"]=$username;
	
$_SESSION["password_session"]=$password;

    // do stuff
	header('location: ' . $env['APP_URL'] . '/index.php', true, 307);
} else {
	
		$_SESSION['user_id']="";
	$_SESSION["user_fullname"]="";
	
    echo $_SESSION['message']='Invalid credentials. Please Try Again';
	header('location: ' . $env['APP_URL'] . '/login.php', true, 307);
}

  
?>