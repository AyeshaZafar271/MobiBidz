<?php


include_once 'dbConfig.php'; 
include_once 'ProductController.php';



 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);
 
  
 $products= $productService->getAllAuctionProducts();

  $productData= array(array());
  $i=0;

 foreach($products as $value)
 {
	 $productData[$i]['id'] = $value['ID'];
	 $productData[$i]['amt'] = $value['price'];
	 $productData[$i]['name'] = $value['Name'];
	 
	 
	 $product_images=$productService->getProductImages($value['ID']);
	 if(!empty($product_images))
	 {
		 $main_image = $product_images[0];
		 $productData[$i]['img'] = $main_image['path'];	 
		 
	 }
	 
	 $product_category = $productService->getProductCategory($value['category_id']);

	 if(!empty($product_category))
	 {
		 $productData[$i]['catagory'] = $product_category['category_name'];
	 }
	 $productData[$i]['seller'] = "mobibidz";
		 
	 $i++;
 }

 $json= json_encode($productData, JSON_NUMERIC_CHECK);
 //$json = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $json);
 echo $json ;





?>