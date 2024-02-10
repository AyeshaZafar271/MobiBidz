<?php  
// Connect with the database 

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "mobibidz";

 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}


?>