<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Register User</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
	<?php include 'menu.php';
	?>
  </div>
  <div id="main_content">
    <div id="admin_header">
      <div class="admin_editoffer_title">Register User</div>
      <div class="right_buttons">
      
        <div class="right_button"><a href="index.php">Back to main</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
    <div class="add_tab">
	<form action="RegisterUserController.php" method="post">
      <div class="form_contact">
        <div class="adminform_row_contact">
          <label class="adminleft">Name: </label>
          <input type="text" name="name" class="form_input_contact" required/>
        </div>
        <div class="adminform_row_contact">
          <label class="adminleft">Email: </label>
          <input type="email" name="email" class="form_input_contact" required/>
        </div>
		<div class="adminform_row_contact">
          <label class="adminleft">Password: </label>
          <input type="password" name="password" class="form_input_contact" required/>
        </div>
		<div class="adminform_row_contact">
          <label class="adminleft">Address: </label>
    
		   <textarea  name="address" rows="" cols=""  required></textarea>
        </div>
			<div class="adminform_row_contact">
          <label class="adminleft">Phone Number: </label>
          <input type="number" name="phone" class="form_input_contact"  required/>
        </div>
					<div class="adminform_row_contact">
          <label class="adminleft">Postcode: </label>
          <input type="text" name="postcode" class="form_input_contact" required/>
        </div>
		
        <div style="float:right; padding:10px 25px 0 0;">
        <button type="submit">  Register User </button>
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
<!-- end of main_container -->
</body>
</html>
