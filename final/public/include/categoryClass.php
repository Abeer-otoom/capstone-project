<?php 

require('DBconnection.php');

class Category extends dbconnection{

	public $cat_id;
	public $cat_name;
	public $cat_desc;
	public $cat_img;
	

	public function create(){
		$query = "INSERT INTO category(cat_name,cat_desc,cat_img)VALUES
		          ('$this->cat_name','$this->cat_desc','$this->cat_img')";
		return $this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM category";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM category WHERE cat_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		$query = "UPDATE category SET cat_name    = '$this->cat_name',
								      cat_desc	  = '$this->cat_desc',
								      cat_img     = '$this->cat_img'
								         WHERE cat_id = $id";
		
		return $this->performQuery($query);
		
	}
	public function delete($id){
		$query = "DELETE FROM category WHERE cat_id = $id";
		$this->performQuery($query);
	}
	
}
 