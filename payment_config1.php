<?php 
 
// Product Details  
// Minimum amount is $0.50 US  
  
  
$productID= "";
$productPrice=0; 


$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 


$productName = urldecode($jsonObj->product_name);  
$productID =  $jsonObj->product_id;  
$productPrice = (int)$jsonObj->product_price; 
$currency = "gpb"; 

$itemName = $productName; 
$itemPrice = $productPrice;  
$currency = "GBP";  
  
/* 
 * Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_API_KEY', 'sk_test_51NZP6DIpEIxx77k1iwbdauLEYnkVQqreEgsNivc6jE5YjqbnU61o3usTCXjqlpOcQKDFhFBgrJPQylJNHapw6iCk00GbOsT5cO'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51NZP6DIpEIxx77k1kZEj6d4gGyZshxTWjF7sSnagvAJp5QZdrW7VJt2llqfGSU0JVaEE0ufbfjOaCpfSc3LbSq0G001TGuCRV2'); 
define('STRIPE_SUCCESS_URL', 'https://example.com/payment-success.php'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'https://example.com/payment-cancel.php'); //Payment cancel URL 
    
// Database configuration   

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "mobibidz";

 
define('DB_HOST', $dbHost);   
define('DB_USERNAME', $dbUsername); 
define('DB_PASSWORD', $dbPassword);   
define('DB_NAME', $dbName); 

 
?>