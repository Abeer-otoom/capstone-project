<?php
include "include/adminClass.php";
$admin_id=$_GET['id'];
$a=new Admin();
$a->delete($admin_id);
header("location:manage_admin.php");
?>