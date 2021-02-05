<?php
include "include/customerClass.php";
$custom_id=$_GET['id'];
$c=new Customer();
$c->delete($custom_id);
header("location:manage_customer.php");
?>