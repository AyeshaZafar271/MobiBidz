<?php

include_once 'dbConfig.php'; 


include_once 'ProductController.php';


session_start();


$user_id =$_SESSION['user_id'];


 if(!isset($_SESSION['username_session']) || $_SESSION['username_session']=="")
 {
	 header( "refresh:2;url=login.php" );
 }


 $productId=$_POST["productId"];
 $product_price=$_POST["product_price"];
 $total_items=$_POST["total_items"];
 $is_valid=true;

 
 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null);
 	

 
 $product= $productService->insertAddToCartDetails($user_id,$productId,$product_price, $total_items, $is_valid);


header( "refresh:0;url=showCart.php?user_id=".$user_id );









?>