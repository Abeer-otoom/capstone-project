<?php
session_start();
if (isset($_SESSION['customer_id']))
{
    header("location:checkout.php");
}
else
{
	header("location:signup/slogin.php");
}
?>