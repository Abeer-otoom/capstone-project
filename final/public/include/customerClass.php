<?php 

require('DBconnection.php');

class Customer extends dbconnection{

	public $custom_id;
	public $name;
	public $email;
	public $password;
	public $address;
	public $phone;
	

	public function create(){
		$query = "INSERT INTO customer(email,password,name,address,phone)VALUES
		          ('$this->email','$this->password','$this->name','$this->address','$this->phone')";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM customer";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM customer WHERE id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		$query = "UPDATE customer SET email         = '$this->email',
								      password	    = '$this->password',
								      name          = '$this->name',
								      address       = '$this->address',
								      phone         = '$this->phone'
								      
								         WHERE id = $id";
		return $this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM customer WHERE id = $id";
		$this->performQuery($query);
	}
		public function login($email,$pass)
	{
		$query = "SELECT * FROM customer WHERE 
		           email    = '$email' AND password  = '$pass' ";

		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}

}
