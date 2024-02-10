<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MobiBidz - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<?php
include_once 'dbConfig.php'; 
include_once 'ProductController.php';
$user_id=$_GET['user_id'];
$productService = new ProductService($db,null,null,null,null,null,null,null,null, null);
$cartDetails= $productService->getCartDetails($user_id);
?>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
   
  </div>
  <?php include 'menu.php';?>
  <div id="main_content">
    <div id="admin_header">
      <div class="admin_index_title">Your Cart</div>
      <div class="right_buttons">
       <!-- <div class="right_button"><a href="#">Add new offer</a></div>
        <div class="right_button"><a href="#">Delete Selected</a></div>
		-->
      </div>
    </div>
    <div id="admin_header_border"></div>
  
    <div class="table_grid">
      <table cellspacing="0" cellpadding="0">
	   
        <tr>
    
          <th style="width:50px;"><a href="#" class="pink">Picture</a></th>
          <th style="width:auto;"><a href="#" class="pink">Name</a></th>
          <th style="width:auto;"><a href="#" class="pink">Price</a></th>
          <th style="width:100px;"><a href="#" class="pink">Total Items</a></th>
		  <th style="width:100px;"><a href="#" class="pink">Update Items</a></th>
		  
          <th style="width:50px;"><a href="#" class="pink">Delete</a></th>
        </tr>
		
	  <?php 
	
	
	$totalOrderCost=0;
	
	$firstProduct = null; 
	$product_count= 0;
	$itemNo=0;
	foreach  ($cartDetails as $cart)
	{
	$product= $productService->getProductbyId($cart['product_id']);
	$productimages=$productService->getProductImages($product['ID']);

	if($product_count==0)
	{
		$firstProduct= $product;

		
	}
	$product_count++;

    
	if(isset($productimages[0])){
	$imagepath=$productimages[0]['path'];
	$totalOrderCost= $totalOrderCost + intval($product['price']);
	
	
	?>
	       <tr class="even">
         
          
		   <td><img alt="" src="<?php echo "uploads/".$imagepath ?>" width="53" height="39" border="0" /></td>
          <td>  <?php echo $product['Name']?></td>

		  <td><strong><?php echo $product['price'] ?> &pound;</strong></td>
		  <td>  <?php echo $cart['total_product_selected']?></td>
		  <td>  <?php echo "update";?></td>
		  <td><a href="deleteFromCartController.php?productInCart=<?php echo $cart['ID']; ?>& userid=<?php echo $user_id; ?>"><img alt=""src="images/adminicons/delete.png" width="24" height="24" border="0" /></a></td>
      </tr>	
	<?php

	}
	
	}
	?>	
      </table>
    </div>

  </div>
  	<h1> Total Order Cost: <?php echo $totalOrderCost; ?> </h1>
	</br>
	  <?php 
	  if (isset($firstProduct))
	  { ?>
	   <a href="payment.php?product_id=<?php echo $firstProduct['ID']; ?>&product_name=<?php echo $firstProduct['Name']; ?>&product_price=<?php echo $totalOrderCost; ?>">
	 
      <img alt="checkout image" src="/mobibidz/images/checkoutImage-logo.jpg" width="100px" height="100px">
	  

   </a>
   	  <?php } ?>
	
	<!-- end of main_content -->
	<?php 
	include 'footer.php';
	
	?>
</div>
<!-- end of main_container -->
</body>
</html>
