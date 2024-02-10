 
 
 <form action="addOrderToCartController.php" onsubmit="return isStockAvailable()" method="post" enctype="multipart/form-data">
    <div class="column1">
      <div class="left_box">
        <div class="top_left_box"> </div>
        <div class="center_left_box">
          <div class="box_title"><span>Add To Cart</span></div>
          <div class="form">
            <div class="form_row">
              <label class="left">Price: </label>
              <label class="left"><b><?php echo $_GET["product_price"]; ?>  £</b> </label>
            </div>
			</br>
			</br>
            <div class="form_row">
              <label class="left">Total Items: </label>
             <input id= "total_items" name="total_items" type="number" value="1">
            </div>
			 <input type="hidden" id="productId" name="productId" value="<?php echo $_GET["productId"]; ?>">
			 <input type="hidden" id="product_price" name="product_price" value="<?php echo $_GET["product_price"]; ?>">
          </br>
		  </br>
		  </br>
		  </br>
	  <div style="float:center;">
        
		 <input type="submit" name="submit" value="Add to Cart">
		
        </div>
		</form>
 