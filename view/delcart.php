<?php
session_start();
$cart=$_SESSION['cart'];
$id=$_GET['productid'];
if($id == 0)
{
	unset($_SESSION['cart']);
}
else
{
unset($_SESSION['cart'][$id]);
}
header("location:../View/success.php");
exit();
