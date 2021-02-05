<?php
include 'include/productClass.php';
$id=$_GET['id'];
$p=new Product();
$p->delete($id);
header("location:read_product.php");

?>
