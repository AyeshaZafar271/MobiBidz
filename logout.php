<?php require_once __DIR__ . '/php_config.php'; ?>
<?php

   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$env = parse_ini_file(__DIR__ . '/.env');
$_SESSION["username_session"]="";
$_SESSION["password_session"]="";
$_SESSION["user_fullname"]="";
$_SESSION['user_id']="";
$_SESSION["user_email"]="";


header('location: ' . $env['APP_URL'] . '/index.php', true, 307);

?>