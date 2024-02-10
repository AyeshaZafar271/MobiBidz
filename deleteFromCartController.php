<?php
include_once 'dbConfig.php'; 
include_once 'ProductController.php';

$user_id =$_GET["userid"];
$product_id=$_GET["productInCart"];

 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);
  
 $product= $productService->deleteFromCart($product_id);
 
 header( "refresh:0;url=showCart.php?user_id=".$user_id );
?>