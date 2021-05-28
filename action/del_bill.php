<?php
include '../libs/connect.php';
$id = (int)$_GET['orderid'];
$sql = "SELECT * FROM orders WHERE idOther = $id";
$query = mysqli_query($conn, $sql);
if($query){
    //xoa bang comment
	$sql2 = "DELETE FROM productorders WHERE idOther = $id";
	$query2 = mysqli_query($conn, $sql2);

	$sql1 = "DELETE FROM orders WHERE idOther = $id";
	$query1 = mysqli_query($conn, $sql1);

	if (!$query1) {
		echo "<script>alert('".mysqli_error($conn). "')</script>";
	}
	else{
		echo "<script>alert('Xóa đơn hàng thành công.')</script>";
		echo "<script>window.location = '../view/bill.php'</script>";
	} 
}
else
	echo "<script>alert('". mysqli_error($conn) . "')</script>";
