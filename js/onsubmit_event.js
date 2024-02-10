 function isStockAvailable()
 {
	
 
 var total_in_stock =parseInt(document.getElementById("total_in_stock").innerText);
 

 var total_selected_items = parseInt(document.getElementById("total_items").value);
 if(total_selected_items > total_in_stock)
 {
	 alert("Unable to add to Cart. Max available items in Stocck are :"+ total_in_stock + ". Please Update Selection." );
	 return false;
 }
 else
	 
	 {
		 return true;
	 }
 
 }