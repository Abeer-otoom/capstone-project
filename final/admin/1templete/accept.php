<?php
include "include/vendorClass.php";
$vendor_id=$_GET['id'];
$v=new Vendor();
$v->update_accept($vendor_id);
header("location:manage_vendor.php");

?>