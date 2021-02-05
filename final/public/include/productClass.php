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

	public function readByvendor($id){
		$query  = "SELECT * FROM vendor , product WHERE product.cat_id=$id AND vendor.vendor_id=product.vendor_id GROUP BY(vendor.vendor_id) ";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function readByproduct($id){
		$query  = "SELECT * FROM product WHERE vendor_id=$id ";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function readproduct($ven_id,$cat_id){
		$query  = "SELECT * FROM product WHERE vendor_id=$ven_id AND cat_id=$cat_id ";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}

	public function featureproduct(){
		$query  = "SELECT * FROM order_item , product WHERE product.pro_id=order_item.pro_id  GROUP BY product.pro_id LIMIT 10  ";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}

	/*feedback table */
    public $prod_id;
	public $feedback_id;
	public $name;
	public $email;
	public $feedback_text;
	
	public function createF(){
		$query = "INSERT INTO feedback(name,email,pro_id,feedback_text)VALUES
		          ('$this->name','$this->email','$this->prod_id' , '$this->feedback_text')";
		return $this->performQuery($query);
	}

	public function readAllF(){
		$query  = "SELECT * FROM feedback";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readByIdF($id){
		$query  = "SELECT name , feedback_text , fdate FROM feedback WHERE pro_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	
	public function deleteF($id){
		$query = "DELETE FROM feedback WHERE id = $id";
		$this->performQuery($query);
	}
	
	
}
