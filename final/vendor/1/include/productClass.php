<?php 

require('categoryClass.php');

class Product extends Category{

	public $pro_id;
	public $pro_name;
	public $pro_desc;
	public $pro_price;
	public $pro_image;
	public $cat_id;
	public $vendor_id;
	
	

	public function create(){
		$query = "INSERT INTO product(pro_name,pro_desc ,pro_price,pro_image ,cat_id , vendor_id)
				 VALUES('$this->pro_name','$this->pro_desc','$this->pro_price','$this->pro_image',
				        '$this->cat_id' , '$this->vendor_id')";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM product";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM product WHERE pro_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		$query = "UPDATE product SET pro_name      = '$this->pro_name',
								    pro_desc       = '$this->pro_desc',
								    pro_price      = '$this->pro_price',
								    pro_image      = '$this->pro_image',
								    cat_id         = '$this->cat_id',
								    vendor_id      ='$this->vendor_id'
								   WHERE pro_id    = $id";
		return $this->performQuery($query);
	}
	
	public function delete($id){
		$query = "DELETE FROM product WHERE pro_id = $id";
		$this->performQuery($query);
	}
	
	
}
