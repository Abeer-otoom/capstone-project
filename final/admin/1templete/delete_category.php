<?php
include "include/categoryClass.php";
$cat_id=$_GET['id'];
$c= new Category();
$c->delete($cat_id);
header("location:manage_category.php");
?>
