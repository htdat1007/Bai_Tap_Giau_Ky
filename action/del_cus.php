<?php
include '../libs/connect.php';
$id = (int)$_GET['userid'];
$sql = "SELECT * FROM user WHERE id = $id";
$query = mysqli_query($conn, $sql);
if($query){
    //xoa bang comment
	$sql2 = "DELETE FROM comment WHERE id = $id";
	$query2 = mysqli_query($conn, $sql2);

	$sql1 = "DELETE FROM user WHERE id = $id";
	$query1 = mysqli_query($conn, $sql1);

	if (!$query1) {
		echo "<script>alert('".mysqli_error($conn). "')</script>";
	}
	else{
		echo "<script>alert('Xóa thành viên thành công.')</script>";
		echo "<script>window.location = '../view/adcustomer.php'</script>";
	} 
}
else
	echo "<script>alert('". mysqli_error($conn) . "')</script>";
