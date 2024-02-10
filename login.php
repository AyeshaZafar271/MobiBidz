<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MobiBidz - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.gif" width="147" height="78" alt="" border="0" /></a> </div>
    <div class="banner_adds"></div>
  </div>
  
  <?php
// define variables and set to empty values
$username = $password = "";
$usernameErr = $passwordErr = "";
session_start();

  if ($_SESSION["username_session"]=="") {
    $usernameErr = "Username is required";

  } else {
    $username = test_input($_SESSION["username_session"]);
	$usernameErr="";
  }

  if ($_SESSION["password_session"]=="") {
    $passwordErr = "Password is required";

  } else {
    $password = test_input($_SESSION["password_session"]);
	$passwordErr="";
  }
  
  if(isset($_SESSION['message']) && $_SESSION['message']!="")
  {
	  $passwordErr=$_SESSION['message'];
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
  
  
  <div id="main_content">
    <div class="admin_login">
      <div class="left_box">
        <div class="top_left_box"> </div>
        <div class="center_left_box">
          <div class="box_title"><span>User</span> login</div>
          <div class="form">
            <div class="form_row">
			<form action="userValidationController.php" method="post">
              <label class="left">Username: </label>
              <input type="text"  name="username" class="form_input" required/>
			  <span class="error"> <?php echo $usernameErr	;?></span>
            </div>
            <div class="form_row">
              <label class="left">Password: </label>
              <input type="password" name="password" class="form_input" required/>
			    <span class="error"> <?php echo $passwordErr;?></span>
            </div>
			         <div style="float:right; padding:10px 25px 0 0;">
             
			  <button type="submit">
				Login
			</button>
			  
            </div>
			</form>
   
          </div>
		  
        </div>
		<?php $_SESSION['message']=""; ?>
        <div class="bottom_left_box"> </div>
		
      </div>
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
