<?php 

require('productClass.php');

class Vendor extends Product{

	public $vendor_id;
	public $name;
	public $email;
	public $password;
	public $logo;
	public $website;
	public $vdesc;
	

	public function create(){
		$query = "INSERT INTO vendor(name,email,password,logo,website , vdesc)
				 VALUES('$this->name','$this->email','$this->password','$this->logo',
				        '$this->website' , '$this->vdesc')";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM vendor ORDER BY vendor_id DESC";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM vendor WHERE vendor_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		$query = "UPDATE vendor SET email            = '$this->email',
								    password         = '$this->password',
								    name             = '$this->name',
								    logo             = '$this->logo',
								    website          = '$this->website',
								    vdesc            ='$this->vdesc'
								   WHERE vendor_id   = $id";
		return $this->performQuery($query);
	}
	public function update_accept($id){
		$query = "UPDATE vendor SET accept='yes' WHERE vendor_id   = $id";
		return $this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM vendor WHERE vendor_id = $id";
		$this->performQuery($query);
	}
	public function login($email,$pass)
	{
		$query = "SELECT * FROM vendor WHERE 
		           email    = '$email' AND password  = '$pass' ";

		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	
}
