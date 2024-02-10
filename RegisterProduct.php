<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MobiBidz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
  
   	<?php 
	  
	  include_once 'menu.php'; 
	  ?>
  
  </div>
  <div id="main_content">
    <div id="admin_header">
      <div class="admin_editoffer_title">Register Product</div>
      <div class="right_buttons">
      
        <div class="right_button"><a href="index.php">Back to main</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
    <div class="add_tab">
	<form action="RegisterProductController.php" method="post" enctype="multipart/form-data">
      <div class="form_contact">
        <div class="adminform_row_contact">
          <label class="adminleft">Title: </label>
          <input type="text" name="title" class="form_input_contact" />
        </div>
        <div class="adminform_row_contact">
          <label class="adminleft">Price: </label>
          <input type="text" name="price" class="form_input_contact" />
        </div>
        <input type="hidden"  name=user_id    value= <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="")
		{			
      echo $_SESSION['user_id'];
	  }?> class="form_input_contact"/>

		<div class="adminform_row_contact">
          <label class="adminleft">Description: </label>
    
		   <textarea  name="description" rows="" cols=""  ></textarea>
        </div>
						<div class="adminform_row_contact">
          <label class="adminleft">Product Category: </label>
          		
	<select id="category" name="category" style="width:252px">
    <option>select category</option>
    <option value="1">Phone</option>
	 <option value="2">Watch</option>
	  <option value="3">Tablet</option>
	   <option value="4">Monitor</option>
	</select>
		
        </div>
			<div class="adminform_row_contact">
          <label class="adminleft">Total in Stock </label>
          <input type="text" name="total_in_stock" class="form_input_contact" />
        </div>
        <div class="adminform_row_contact">
          <label class="adminleft">Registration Type: </label>	
	        <select  name="rtype" style="width:252px">
            <option>select</option>
            <option value="0">Direct Sale </option>
            <option value="1">Auction</option> 
	        </select>
		
        </div>

		<div class="adminform_row_contact">
          <label class="adminleft">Upload Images: </label>
       
		  <input type="file" name="files[]" multiple ><br><br>
        </div>

        
		
        <div style="float:right; padding:10px 150px 0 0;">
        
		 <input type="submit" name="submit" value="Register Product">
    
        </div>
      </div>
	  </form>
    </div>
  </div>
  <!-- end of main_content -->
  <?php
	include "footer.php";
  ?>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
