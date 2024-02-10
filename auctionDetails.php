
<?php header('Access-Control-Allow-Origin: *'); ?>
		  <?php 
	  
	     if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	$user_id="";
	if(isset($_SESSION['user_id']))
	$user_id=$_SESSION['user_id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MobiBidz - Product Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/onsubmit_event.js"></script>
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
    <?php include 'menu.php'; ?>
  </div>
  <div id="main_content">
  
	
	<?php //include($_SERVER['DOCUMENT_ROOT']."/mobibidz/node/index.html"); ?>
	    <div class="column1">
      <div class="left_box">
	      <div class="top_left_box"> </div>
	<?php if($user_id !=null and $user_id!="")
	{
?>		
		  
	 <iframe src="http://localhost:3000/addBidding/<?php echo $_GET['productId']."_".$user_id?>" width="220" height="400" title="W3Schools Free Online Web Tutorials">
</iframe> 

	<?php }
	else
	{
	?>
	
		 <iframe src="http://localhost:3000/addBidding.php" width="220" height="400" title="W3Schools Free Online Web Tutorials">
</iframe> 

	<?php }?>
<?php //include  'addBidding.php';?>

</div>
</div>

<?php

$document_root = $_SERVER['DOCUMENT_ROOT'];

//include($document_root.'/mobibidz/addBidding.html');


// require  '/node/addBidding.php';
?>

  
   

    <!-- end of column one -->
	
	<?php
	
		  
	  include_once 'dbConfig.php'; 


	include_once 'ProductController.php';
	
	
	 $productService = new ProductService($db,null,null,null,null,null,null,null,null, null);

	 $productId=$_GET["productId"];
	$product= $productService->getProductbyId($productId);

	$productimages=$productService->getProductImages($productId);
	
	?>
	
    <div class="column4">
      <div class="title"> <?php echo $product['Name'];  ?> </div>
    </div>
    <!-- end of column four -->
    <div class="column2" style="background-color:#f3f5f6; margin-left:5px;">
      <div class="big_pic"><img src="<?php echo "uploads/".$productimages[0]['path'] ?>" width="282" height="212" alt="" class="img_big_pic" /></div>
      <div class="pictures_thumbs">
        <h3>Pictures available:</h3>
		
		<?php 	for  ($i=1; $i<count($productimages); $i++)
		{
		?>
        <a href="#"><img src="<?php echo "uploads/".$productimages[$i]['path']; ?>" width="104" height="78" border="0" alt="" class="img_thumb" /></a> 
    </div>
	<?php }?>
    <!-- end of column two -->
    <div class="column3">
      <div class="main_text_box">
        <h1>Description</h1>
        <p> <?php echo $product['description'] ?>  </div>
      <div class="title2">Details:</div>
      <div class="details_list">
        <ul>
          <li><span>Starting Price:</span> <?php echo $product['price'] ?> $ </li>
          <li><span>Store:</span> <?php echo "mobiBidz" ?></li>
         
        </ul>
      </div>
	  
	  
    </div>

  </div>
</div>
<!-- end of main_container -->
</body>
</html>
