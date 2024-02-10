<?php

class ProductService
{
    protected $_title;    // using protected so they can be accessed
    protected $_description; // and overidden if necessary
	protected $_category;
	protected $_total_in_stock;
	protected $_type;
	protected $date_added;
	protected $store_id;
	protected $_price;
	protected $is_valid;
	
    protected $_db;       // stores the database handler
    protected $_product;     // stores the product data


    public function __construct(PDO $db, $title,$description,$category,$total_in_stock,$type,$date_added,$store_id,$is_valid, $price) 
    {
       $this->_db = $db;
     $this->_title = $title;   
     $this->_description= $description;
	 $this->_category= $category;
	 $this->_total_in_stock= $total_in_stock;
	 $this->_type= $type;
	 $this->_date_added= $date_added;
	 $this->_store_id= $store_id;
	 $this->_is_valid= $is_valid;
	 $this->_price= $price;	 
    }
	
	
	public function setDb(PDO $db)
	
	{
		      $this->_db = $db;
		
	}
	

    public function login()
    {
        $user = $this->_checkCredentials();
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION['user_id'] = $user['ID'];
            return $user['ID'];
        }
        return false;
    }

    protected function _checkProducts()
    {
         $result=$this->_db->query('SELECT * FROM product ORDER BY ID DESC LIMIT 1');
	     $productReturned = $result->fetch();
        if ($productReturned!=null) {
            
			echo "\n";
			print_r($productReturned);
                return $productReturned;
            
        }
        return null;
    }
	
	public function getAllProducts()
	{
		   $result=$this->_db->query('SELECT * FROM product where is_valid =1 and type =0 ORDER BY date_added DESC');
		  
		   $products=array();
	    while($product = $result->fetch())
        if ($product !=null) {
			array_push($products,$product);
            

            
        }
        return $products;
	}
	public function getAllAuctionProducts()
	{
		   $result=$this->_db->query('SELECT * FROM product where is_valid =1 and type =1 ORDER BY date_added DESC');
		  
		   $products=array();
	    while($product = $result->fetch())
        if ($product !=null) {
			array_push($products,$product);
            

            
        }
        return $products;
	}
	
	public function getBiddingDetails($product_id)
	{

		   $bids=array();
		   $stmt=$this->_db->prepare('SELECT * FROM product_bids where product_id =? ORDER BY bid_price DESC');
		   	$stmt->execute([$product_id]); 
	
	    while($bid = $stmt->fetch())
        if ($bid !=null) {
			array_push($bids,$bid);
        }
        return $bids;
	}
	
	
	
	public function insertBiddingDetails($user_id, $product_id,$bid_value)
	{
				try {
		 $sql = "INSERT INTO product_bids (product_id, user_id, bid_price, bid_time)
		VALUES ('".$product_id."', '".$user_id."', '".$bid_value."','".date("Y-m-d")."')";
		
		
		 $this->_db->exec($sql);
		 return "New record created successfully";
		  ;
		}
		catch(PDOException $e) {
  return $sql . "<br>" . $e->getMessage();
}
		
		
	}
	

	
	public function preparedQuery($sql,$params) {
  for ($i=0; $i<count($params); $i++) {
    $sql = preg_replace('/\?/',$params[$i],$sql,1);
  }
  return $sql;
}

	
	public function getProductbyId($productId)
	{
				$stmt=$this->_db->prepare('SELECT * FROM product WHERE ID=?');
			$stmt->execute([$productId]); 
			$property = $stmt->fetch();
			
	
        return $property;
	}
	
	public function getProductImages($productId)
	{
			$stmt=$this->_db->prepare('SELECT * FROM product_images WHERE product_id=?');
			$stmt->execute([$productId]); 
			$product_images = $stmt->fetchAll();
	
	
        return $product_images;
	}
	
		public function getProductCategory($category_ID)
	{
			$stmt=$this->_db->prepare('SELECT * FROM product_category WHERE ID=?');
			$stmt->execute([$category_ID]); 
			$product_category = $stmt->fetch();
	
	
        return $product_category;
	}

    public function getProduct()
    {
        return $this->_product;
    }
	
	protected function _checkProperties()
    {
         $result=$this->_db->query('SELECT * FROM product ORDER BY ID DESC LIMIT 1');
	     $productReturned = $result->fetch();
        if ($productReturned!=null) {
            
			echo "\n";
			print_r($productReturned);
                return $productReturned;
            
        }
        return null;
    }
	
	public function insertProductDetails()
	{
		try {
		 $sql = "INSERT INTO product (Name, category_id, store_id, price, date_added, is_valid, total_in_stock,description,type)
  VALUES ('".$this->_title."', '".$this->_category."', '".$this->_store_id."', '".$this->_price."','".$this->_date_added."','".$this->_is_valid."','".$this->_total_in_stock."','".$this->_description."','".$this->_type."')";
		

		 $this->_db->exec($sql);
		 echo "New record created successfully".$this->_store_id;
		 return $this->_checkProperties();
		}
		catch(PDOException $e) {
  return $sql . "<br>" . $e->getMessage();
}
	}
	
	
	
		public function insertAddToCartDetails($user_email,$productId,$product_price, $total_items, $is_valid)
	{
		try {
		 $sql = "INSERT INTO account_cart (product_id, user_id, total_product_selected, is_valid, product_price)
		VALUES ('".$productId."', '".$user_email."', '".$total_items."','".$is_valid."','".$product_price."')";
		
		
		 $this->_db->exec($sql);
		 return $this->_checkATCProperties();
		}
		catch(PDOException $e) {
  return $sql . "<br>" . $e->getMessage();
}
	}
	
	public function getCartDetails($user_id)
	{
		
			$stmt=$this->_db->prepare('SELECT * FROM account_cart WHERE user_id=? and is_valid=1');
			$stmt->execute([$user_id]); 
			$cart_items = $stmt->fetchAll();
	
	
        return $cart_items;
	}
	
		protected function _checkATCProperties()
    {
         $result=$this->_db->query('SELECT * FROM account_cart ORDER BY ID DESC LIMIT 1');
	     $atcproductReturned = $result->fetch();
        if ($atcproductReturned!=null) {
                return $atcproductReturned;
            
        }
        return null;
    }
	
	
	
	public function deleteProduct($product_id)
	

	{

		$stmt=$this->_db->prepare('DELETE FROM product  WHERE ID=?');
	    $stmt->execute([$product_id]); 
		
		
		$stmt=$this->_db->prepare('DELETE FROM product_images  WHERE product_id=?');
	    $stmt->execute([$product_id]); 
		 
		try{
		
		$property=$this->getProductbyId($product_id);
		 echo "Product deletd sucessfully";
		 
		}
		catch(Exception $e) {
  		echo 'Message: ' .$e->getMessage();
  		echo "Product still exist. Deletion failed. Provide correct product id";	
	
}
	
		
	}
	
	public function deleteFromCart($ID)
	{
		
		 
		try{
		
			$stmt=$this->_db->prepare('DELETE FROM account_cart  WHERE ID=?');
			$stmt->execute([$ID]); 
		 
		}
		catch(Exception $e) {
  		echo 'Message: ' .$e->getMessage();
  		echo "Product still exist. Deletion failed.";	
	
}
	
		
	}
}
?>