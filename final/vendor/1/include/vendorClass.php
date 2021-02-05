<?php 

require('DBconnection.php');

class Vendor extends dbconnection{

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
		$query  = "SELECT * FROM vendor";
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
	public function order_detail($id , $cust_id,$order_id){
		
		$query  = "SELECT order_item.order_id,customer.id,product.pro_id, order_item.qty_size, product.pro_name ,product.pro_price
		FROM orders 
		 INNER JOIN order_item ON orders.order_id = order_item.order_id
		 INNER JOIN customer ON customer.id = orders.cust_id 
		 INNER JOIN product ON product.pro_id = order_item.pro_id 
		 WHERE vendor_id =$id AND customer.id=$cust_id AND order_item.order_id=$order_id ";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}

	public function readorder($id){
		
		$query  = "SELECT order_item.order_id,orders.date,customer.id , customer.phone,customer.name,customer.email, customer.address , orders.total 
		FROM orders 
		INNER JOIN order_item ON orders.order_id = order_item.order_id 
		INNER JOIN customer ON customer.id = orders.cust_id 
		INNER JOIN product ON product.pro_id = order_item.pro_id 
		WHERE vendor_id =$id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}

	
}
