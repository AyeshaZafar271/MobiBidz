<?php


include_once 'dbConfig.php'; 
include_once 'ProductController.php';


$product_id =$_GET['product_id'];


 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);
 
  
 $bids= $productService->getBiddingDetails($product_id);
 
 
   $bidsData= array(array());
  $i=0;

 foreach($bids as $value)
 {
	 $bidsData[$i]['product_id'] = $value['product_id'];
	 $bidsData[$i]['user_id'] = $value['user_id'];
	 $bidsData[$i]['bid_price'] = $value['bid_price'];
	 
		 
	 $i++;
 }

 $json= json_encode($bidsData, JSON_NUMERIC_CHECK);
 //$json = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $json);
 echo $json ;

?>