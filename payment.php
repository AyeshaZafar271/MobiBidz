

<?php 
// Include configuration file   
require_once 'payment_config.php';  
?>

<html>
<head>
<title> Product Payment </title>


<script src="https://js.stripe.com/v3/"></script>

<style >
 div .panel {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
}


</style>
</head>

<body>


<div class="panel" style ="  position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);">
    <div class="panel-heading">
        <h3 class="panel-title">Charge <?php echo '£'.$itemPrice; ?> with Stripe</h3>
        
        <!-- Product Info -->
        <label><b>Item Name:</b></label> <label id="product_name"> <?php echo $itemName; ?></label>
		</br>
        <label ><b>Price:</b> </label> <label id="product_price"> <?php echo $itemPrice?> </label><label><?php ' '.$currency; ?></label>
		</br>
		<label id= "product_id" style="display:none"> <?php echo $productID ?> </label>
    </div>
    <div class="panel-body">
        <!-- Display status message -->
        <div id="paymentResponse" class="hidden"></div>
        
        <!-- Display a payment form -->
        <form id="paymentFrm" class="hidden">
            <div class="form-group">
                <label>NAME</label>
                <input type="text" id="customer_name" class="field" value ="<?php     if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	echo $_SESSION["user_fullname"];  ?>" placeholder="Enter name" required="" autofocus="">
            </div>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" id="customer_email" value ="<?php     if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	echo $_SESSION["user_email"];  ?>" class="field" placeholder="Enter email" required="">
            </div>
            
            <div id="paymentElement">
                <!--Stripe.js injects the Payment Element-->
            </div>
            
            <!-- Form submit button -->
            <button id="submitBtn" class="btn btn-success">
                <div class="spinner hidden" id="spinner"></div>
                <span id="buttonText">Pay Now</span>
            </button>
        </form>
        
        <!-- Display processing notification -->
        <div id="frmProcess" class="hidden">
            <span class="ring"></span> Processing...
        </div>
        
        <!-- Display re-initiate button -->
        <div id="payReinit" class="hidden">
            <button class="btn btn-primary" onClick="window.location.href=window.location.href"><i class="rload"></i>Re-initiate Payment</button>
        </div>
    </div>
</div>

<script src="js/payment_checkout1.js" STRIPE_PUBLISHABLE_KEY="<?php echo STRIPE_PUBLISHABLE_KEY; ?>" ></script>

</body>



</html>

