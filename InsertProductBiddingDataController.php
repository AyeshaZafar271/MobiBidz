<?php


include_once 'dbConfig.php'; 
include_once 'ProductController.php';


$product_id =$_GET['product_id'];
$user_id = $_GET['user_id'];
$bid_value =$_GET['bid_value'];

 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);
 
  
 $message= $productService->insertBiddingDetails($user_id, $product_id,$bid_value);
 echo $message;

?>