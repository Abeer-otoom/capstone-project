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
		$query = "INSERT INTO customer(email,password,name,address,phone,city)VALUES
		          ('$this->email','$this->password','$this->name','$this->address','$this->phone','$this->city')";
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
								      phone         = '$this->phone',
								      city          = '$this->city'
								         WHERE id = $id";
		return $this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM customer WHERE id = $id";
		$this->performQuery($query);
	}
}
