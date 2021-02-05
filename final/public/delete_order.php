<?php
session_start();
$id=$_GET['id'];

foreach ($_SESSION['item'] as $key => $value) 
{   
	if ($key==$id) 
	{
		unset($_SESSION['item'][$key]);
		header("location:cart.php");
	}
}
?>