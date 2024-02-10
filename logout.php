<?php

   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$_SESSION["username_session"]="";
$_SESSION["password_session"]="";
$_SESSION["user_fullname"]="";
$_SESSION['user_id']="";
$_SESSION["user_email"]="";


header('location: http://localhost/mobibidz/index.php', true, 307);

?>