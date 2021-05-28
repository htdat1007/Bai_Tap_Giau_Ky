<?php
include '../libs/connect.php';
$id = (int)$_GET['contactid'];
$sql = "SELECT * FROM contact WHERE contactID = $id";
$query = mysqli_query($conn, $sql);
if($query){
    //xoa bang comment
  $sql2 = "DELETE FROM contact WHERE contactID = $id";
  $query2 = mysqli_query($conn, $sql2);

 

  if (!$query2) {
    echo "<script>alert('".mysqli_error($conn). "')</script>";
  }
  else{
    echo "<script>alert('Xóa phản hồi thành công.')</script>";
    echo "<script>window.location = '../view/contact.php'</script>";
  } 
}
else
  echo "<script>alert('". mysqli_error($conn) . "')</script>";
