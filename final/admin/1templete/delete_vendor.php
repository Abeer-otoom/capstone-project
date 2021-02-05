<?php
include 'include/vendorClass.php';
$x=new Vendor();
$id=$_GET['id'];
$x->delete($id);

header("location:manage_vendor.php");

?>