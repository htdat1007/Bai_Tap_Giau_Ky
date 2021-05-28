<?php
include '../libs/connect.php';
$id = (int)$_GET['commentid'];
$sql = "SELECT * FROM comment WHERE commentID = $id";
$query = mysqli_query($conn, $sql);
if($query){
    //xoa bang comment
  $sql2 = "DELETE FROM comment WHERE commentID = $id";
  $query2 = mysqli_query($conn, $sql2);

 

  if (!$query2) {
    echo "<script>alert('".mysqli_error($conn). "')</script>";
  }
  else{
    echo "<script>alert('Xóa bình luận thành công.')</script>";
    echo "<script>window.location = '../view/comment.php'</script>";
  } 
}
else
  echo "<script>alert('". mysqli_error($conn) . "')</script>";
