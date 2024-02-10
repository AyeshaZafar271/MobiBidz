<?php

include_once 'dbConfig.php'; 


include_once 'ProductController.php';

include_once 'uploadFiles.php';

 $title=$_POST["title"];
 $price=$_POST["price"];
 $description=$_POST["description"];
 $category=$_POST["category"];
 $total_in_stock=$_POST["total_in_stock"];
 $type=$_POST["rtype"];
 $date_added=date("Y-m-d");
 $is_valid=true;
 $store_id=$_POST["user_id"];
 
 $productService = new ProductService($db,$title,$description,$category,$total_in_stock,$type,$date_added,$store_id,$is_valid, $price);
 	

 
 $product= $productService->insertProductDetails();


 uploadFiles($product,$db);
header( "refresh:2;url=index.php" );









?>