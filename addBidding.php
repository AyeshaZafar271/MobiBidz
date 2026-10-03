<?php require_once __DIR__ . '/php_config.php'; ?>
<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
	$env = parse_ini_file(__DIR__ . '/.env');
	$socketUrl = $env['SOCKET_URL'];

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
		  <input id="input" type="number" step="0.01" min="0.01" autocomplete="off" placeholder="Enter bid amount" />
		  <button>Send</button>
		</form>
		<p id="bid-error" style="color:red;font-weight:bold;display:none;"></p>
		
<?php }
?>
        </div>
		
	</body>
	

<script src="<?php echo $socketUrl; ?>/socket.io/socket.io.js"></script>

    <script>

      var highestBid = 0;

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
	  var bidPrice = parseFloat(data[i]['bid_price']);
	  if (bidPrice > highestBid) highestBid = bidPrice;
	  var item = document.createElement('li');
        item.textContent = 'user id:'+ data[i]['user_id']+' added bid:'+data[i]['bid_price'];
        messages.appendChild(item);
	 }
}

function showBidError(msg) {
    var el = document.getElementById('bid-error');
    el.textContent = msg;
    el.style.display = 'block';
}

function hideBidError() {
    var el = document.getElementById('bid-error');
    el.textContent = '';
    el.style.display = 'none';
}

	   populateBiddingData();

	  var socket = io.connect('<?php echo $socketUrl; ?>');

      var messages = document.getElementById('messages');
      var form = document.getElementById('form');
      var input = document.getElementById('input');

	  var user_id = document.getElementById('user_id').innerHTML;
	  var product_id = document.getElementById('product_id').innerHTML;

      form.addEventListener('submit', function(e) {
        e.preventDefault();
        hideBidError();

        var bidValue = parseFloat(input.value);

        if (!input.value || isNaN(bidValue)) {
            showBidError('Bid amount must be a valid number.');
            return;
        }
        if (bidValue <= 0) {
            showBidError('Bid amount must be greater than 0.');
            return;
        }
        if (bidValue <= highestBid) {
            showBidError('Bid must be greater than the current highest bid of ' + highestBid.toFixed(2) + '.');
            return;
        }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var response = JSON.parse(this.responseText);
          if (response.error) {
              showBidError(response.error);
              return;
          }
		  highestBid = bidValue;
		  socket.emit('chat message', 'user id: '+ user_id + ' added bid:'+ bidValue);
          input.value = '';
      } else if (this.readyState == 4 && this.status == 400) {
          var response = JSON.parse(this.responseText);
          showBidError(response.error);
      }
    };
    xmlhttp.open("GET", "InsertProductBiddingDataController.php?product_id="+product_id+"&user_id="+user_id+"&bid_value="+bidValue, true);
    xmlhttp.send();

      });

      socket.on('chat message', function(msg) {
        var item = document.createElement('li');
        item.textContent = msg;
        messages.appendChild(item);
        window.scrollTo(0, document.body.scrollHeight);
        var parts = msg.match(/added bid:([\d.]+)/);
        if (parts) {
            var newBid = parseFloat(parts[1]);
            if (newBid > highestBid) highestBid = newBid;
        }
      });
    </script>
	
	</html>