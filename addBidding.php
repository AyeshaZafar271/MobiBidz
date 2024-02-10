<?php header('Access-Control-Allow-Origin: *'); ?>
<?php 

	$user_id="";
	$parameter_id ="";
	$product_id = "";
	
	if(isset($_GET['id']))
	{
	$parameter_id=$_GET['id'];
	
	$arr = explode( "_",$parameter_id);
	$product_id = $arr[0];
	$user_id = $arr[1];
	
	}
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
			<label id="user_id"   hidden><?php echo $user_id ?> </label>
			<label id="product_id" hidden><?php echo $product_id ?> </label>
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
	

<script src="http://localhost:3000/socket.io/socket.io.js"></script>

    <script>
  

function populateBiddingData() {

 var product_id = document.getElementById('product_id').innerHTML;
 


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         data = JSON.parse(this.responseText);

		 displayExistingBiddings(data);

      }
    };
    xmlhttp.open("GET", "getProductBiddingDataController.php?product_id="+product_id, true);
    xmlhttp.send();
  
}

function displayExistingBiddings(data)
{
	
	 var messages = document.getElementById('messages');
	 
	 for(i=0; i<data.length; i++)
	 {
	  var item = document.createElement('li');
        item.textContent =   'user id:'+ data[i]['user_id']+' added bid:'+data[i]['bid_price'];
        messages.appendChild(item);
	 }
}

	   populateBiddingData();
  
	  var socket = io.connect('http://localhost:3000');

      var messages = document.getElementById('messages');
      var form = document.getElementById('form');
      var input = document.getElementById('input');
	  
	  var user_id = document.getElementById('user_id').innerHTML;
	  var product_id = document.getElementById('product_id').innerHTML;

      form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (input.value) {
   
		  
		  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          
		  socket.emit('chat message', 'user id: '+ user_id + ' added bid:'+ input.value);
          input.value = '';  
      }
    };
    xmlhttp.open("GET", "InsertProductBiddingDataController.php?product_id="+product_id+"&user_id="+user_id+"&bid_value="+input.value, true);
    xmlhttp.send();
		  
		  
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