<?php


include_once 'dbConfig.php'; 
include_once 'ProductController.php';


$product_id=$_GET["product_id"];

 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);
 
  
 $product= $productService->deleteProduct($product_id);
header( "refresh:0;url=admin.php" );




?>