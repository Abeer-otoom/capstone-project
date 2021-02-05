<?php 

require('DBconnection.php');

class Admin extends dbconnection{

	public $admin_id;
	public $admin_name;
	public $admin_email;
	public $admin_password;
	public $admin_img;
	

	public function create(){
		$query = "INSERT INTO admin(admin_email,admin_password,admin_name,admin_img)
				 VALUES('$this->admin_email','$this->admin_password','$this->admin_name','$this->admin_img')";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM admin";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM admin WHERE admin_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		$query = "UPDATE admin SET admin_email      = '$this->admin_email',
								   admin_password	= '$this->admin_password',
								   admin_name       = '$this->admin_name',
								   admin_img        ='$this->admin_img'
								   WHERE admin_id   = $id";
		return $this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM admin WHERE admin_id = $id";
		$this->performQuery($query);

	}
	public function login($email,$pass){
		$query  = "SELECT * FROM admin 
		           WHERE admin_email    = '$email' AND
					     admin_password = '$pass' ";
		
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
}
