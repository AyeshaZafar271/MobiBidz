<?php

class UserService
{
    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary
	protected $_address;
	protected $_name;
	protected $_postcode;
	protected $_phone;
    protected $_db;       // stores the database handler
    protected $_user;     // stores the user data

    public function __construct(PDO $db, $email, $password) 
    {
       $this->_db = $db;
       $this->_email = $email;
       $this->_password = $password;
    }
	
	public function setupData(PDO $db, $email, $password,$name,$address,$phone,$postcode) 
    {
       $this->_db = $db;
       $this->_email = $email;
       $this->_password = $password;
	   $this->_name = $name;
	   $this->_address = $address;
	   $this->_phone = $phone;
	   $this->_postcode = $postcode;
    }
	
	

    public function login()
    {
        $user = $this->_checkCredentials();
		
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION['user_id'] = $user['ID'];
			$this->checkRole($user['ID']);
            return $user['ID'];
        }
        return false;
    }
	   protected function _checkCredentials()
    {
        $stmt = $this->_db->prepare('SELECT * FROM account WHERE Email=?');
        $stmt->execute(array($this->_email));
		
		
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
			print_r($user);
            $submitted_pass = $this->_password;
            if ($submitted_pass == $user['Password']) {
                return $user;
            }
        }
        return false;
    }
	
	public function checkRole($user_id)
	{
		
		$stmt = $this->_db->prepare('SELECT * FROM role WHERE user_id=?');
        $stmt->execute(array($user_id));
		if ($stmt->rowCount() > 0) {
			
			$role = $stmt->fetch(PDO::FETCH_ASSOC);
			if($role['role_name']=="admin")
			{
				$_SESSION['is_admin']=true;
			}
			else
				$_SESSION['is_admin']=false;
		}
		else
		{
			$_SESSION['is_admin']=false;
		}
	}

 

    public function getUser()
    {
        return $this->_user;
    }
	
	public function insertUserAccount()
	{
		try {
		 $sql = "INSERT INTO account (Email, Password, Name,Address,Phone,Postcode)
  VALUES ('".$this->_email."', '".$this->_password."', '".$this->_name."','".$this->_address."','".$this->_phone."','".$this->_postcode."')";
		
		 $this->_db->exec($sql);
		 return "New record created successfully";
		}
		catch(PDOException $e) {
  return $sql . "<br>" . $e->getMessage() ." ";
}
	}
}
?>