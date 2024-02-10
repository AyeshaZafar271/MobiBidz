<?php 

	$user_id="";

	if(isset($_GET['user_id']))
	$user_id=$_GET["user_id"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>

	
    
        <div class="center_left_box">
          <div class="box_title"><span>Place your Bidding</span></div>
          <div class="form">
            <div class="form_row">
              <label class="left">Last Price: </label>
              <label class="left"><b><?php //echo $_GET["product_price"]; ?>  £</b> </label>
            </div>
			</br>
			</br>
            <div class="form_row">
			<label id="user_id" type="hidden" ><?php echo $user_id ?> <label>
              <ul id="messages"></ul>
             
            </div>
			</div>
			</div>
		<!--	 <input type="hidden" id="productId" name="productId" value="<?php //echo $_GET["productId"]; ?>">
			 <input type="hidden" id="product_price" name="product_price" value="<?php //echo $_GET["product_price"]; ?>">
			 
			 -->
          </br>
		  </br>
		  </br>
		  </br>
	  <div style="float:center;">
	  <?php 
	  


if ($user_id==null || $user_id=="")
{
	echo "Please login to participate in bidding";
}
else
{
	?>
	  
        <form id="form" method="post" action="">
		  <input id="input" autocomplete="off" /><button>Send</button>
		</form>
		
<?php }
?>
        </div>
		
	</body>
	
	
    <script src="/socket.io/socket.io.js"></script>

    <script>
      var socket = io();

      var messages = document.getElementById('messages');
      var form = document.getElementById('form');
      var input = document.getElementById('input');
	  
	  var user_id = documetn.getElementById('user_id');

      form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (input.value) {
          socket.emit('chat message', 'user id: '+ user_id + ' added bid:'+ input.value);
          input.value = '';
        }
      });

      socket.on('chat message', function(msg) {
        var item = document.createElement('li');
        item.textContent = msg;
        messages.appendChild(item);
        window.scrollTo(0, document.body.scrollHeight);
      });
    </script>
	
	</html>