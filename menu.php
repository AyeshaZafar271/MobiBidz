    <div class="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <!--<li><a href="admin.html">Admin
         
          </a>
  
        </li> -->
        <li><a href="login.php">Login
          <!--[if IE 7]><!-->
          </a>

        </li>
        <li><a href="auctionList.php">Online Auction
          <!--[if IE 7]><!-->
          </a>

        <li><a href="RegisterProduct.php">Register Product</a></li>
		<li><a href="RegisterUser.php">Sign Up</a></li>
	
        <li><a href="contact.php	">Contact Us</a></li>
		<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
		<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="")
		{			?>
		
		<li><a href="<?php echo "showCart.php?user_id=".$_SESSION['user_id'] ?>">Your Cart</a><img src="images/add-to-cart.jpg" style="width:25; height:25px; position: relative;
  left:10px; " ></li>
		<?php  }?>
      </ul>
    </div>