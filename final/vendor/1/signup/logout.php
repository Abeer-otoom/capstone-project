<?php
session_start();
unset($_SESSION['vendor_id']);
header("location:slogin.php");
?>