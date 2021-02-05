<?php 

require('productClass.php');

class Order extends Product{

	public $order_id;
	public $total;
	public $cust_id;
	public $order_item_id;
	public $qty_size;
	public $pro_id;
	

	public function createorder(){
		$query = "INSERT INTO  orders(cust_id , total)VALUES
		          ('$this->cust_id','$this->total')";
		return $this->performQuery($query);
	}
	public function create_item(){
		$query = "INSERT INTO  order_item(order_id,pro_id,qty_size)VALUES
		          ('$this->order_id','$this->pro_id' , '$this->qty_size')";
		
		 return $this->performQuery($query);
		
	}

	public function readorder(){
		$query  = "SELECT * from orders ORDER BY order_id DESC LIMIT 1";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readitem($order_id){
		$query  = "SELECT * from order_item , product where order_id=$order_id and item_order.pro_id=product.pro_id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	
	public function delete($id){
		$query = "DELETE FROM  orders WHERE order_id = $id";
		$this->performQuery($query);
	}
	
}
 