<?php
include "include/vendorClass.php";
$vendor_id=$_GET['id'];
$v=new Vendor();
$v->delete($vendor_id);
header("location:manage_vendor.php");

?>