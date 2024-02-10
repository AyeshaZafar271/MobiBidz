<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MobiBidz - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
   
  </div>
  <?php include 'menu.php';?>
  <div id="main_content">
    <div id="admin_header">
      <div class="admin_index_title">Manage Offers</div>
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
          <th style="width:20px;"><a href="#" class="pink">ID</a></th>
          <th style="width:50px;"><a href="#" class="pink">Picture</a></th>
          <th style="width:auto;"><a href="#" class="pink">Name</a></th>
          <th style="width:auto;"><a href="#" class="pink">Description</a></th>
          <th style="width:100px;"><a href="#" class="pink">Price</a></th>
          <th style="width:50px;"><a href="#" class="pink">Delete</a></th>
        </tr>
	  
	  <?php 
	  
	  include_once 'dbConfig.php'; 


	include_once 'ProductController.php';
	
	 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);
	$products= $productService->getAllproducts();
	
	
	foreach  ($products as $product)
	{
	
	$productimages=$productService->getProductImages($product['ID']);

	if(isset($productimages[0])){
	$imagepath=$productimages[0]['path'];
	?>
	
	       <tr class="even">
         
          <td><?php echo $product['ID']; ?></td>
		   <td><img alt="" src="<?php echo "uploads/".$imagepath ?>" width="53" height="39" border="0" /></td>
          <td>  <?php echo $product['Name']?></td>
		  <td>  <?php echo $product['description']?></td>
		  <td><strong><?php echo $product['price'] ?> &euro;</strong></td>
          <td><a href="deleteProductController.php?product_id=<?php echo $product['ID']; ?>"><img alt="" src="images/adminicons/delete.png" width="24" height="24" border="0" /></a></td>
      </tr>	
	<?php

	}
	
 
	  
	}
	


	?>	
	  
	   
	  
	  
	  
	 
      </table>
    </div>
    <div class="pagination"> <span class="disabled">prev</span> <span class="current">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a>...<a href="#">199</a> <a href="#">200</a> <a href="#">next</a> </div>
  </div>
  <!-- end of main_content -->
	<?php 
	include 'footer.php';
	
	?>
</div>
<!-- end of main_container -->
</body>
</html>
