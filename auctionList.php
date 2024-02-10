<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MobiBidz - Auction Products List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="slider.css" />
 <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
	 	  <?php 
	  
	  include_once 'menu.php'; 
	  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	  
	   $_SESSION['username_session']="";
	   $_SESSION['password_session']="";
	   
	  ?>
  </div>
  	 
	


	 <div class="container">
      <div class="sidebar">
        <div class="logo">Filter Products</div>
        <input type="text" id="txtSearch" placeholder="Search Product..." />
        <h3>Category</h3>
        <ul class="category-list">

        </ul>
        <h3>Price Range</h3>
        <div class="price">
          <input type="range" id="priceRange" />
          <span class="priceValue">500</span>
        </div>
      </div>
      <div class="content">
        <div class="products"></div>
      </div>
      <label style="float:right"> <?php

if(isset($_SESSION['user_fullname']) && $_SESSION['user_fullname']!="")
{		
echo "Welcome ".$_SESSION["user_fullname"]; 
echo "</br>";
if ($_SESSION['is_admin']==true)
{
 echo "  <a style='float:right;' href='admin.php'>Admin Screen</a>";
  echo "</br>";
}
echo "  <a style='float:right;' href='logout.php'>Logout</a>";
}
?>
 </label>
    </div>
  
  
     <script src="js/auctionProducts.js"></script>
	 	
	

  <!-- end of main_content -->
  <?php
	include "footer.php";
  ?>
</div>
<!-- end of main_container -->
</body>
</html>
