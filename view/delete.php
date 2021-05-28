<?php
  include '../libs/connect.php';
  
  $conn->set_charset("utf8");
   $a = (int)$_GET['productid'];

  $sql = "SELECT * FROM `product` WHERE productID = $a";
  
  $query = mysqli_query($conn, $sql);

  if($query){
    $row = mysqli_fetch_array($query);
    $b = (int)$row['categoryID'];
    //xoa bang comment
    $sql2 = "DELETE FROM `comment` WHERE productID = $a";
    $query2 = mysqli_query($conn, $sql2);

    //xoa bang thong so
    $sql3 = "DELETE FROM `thongso` WHERE productID = $a";
    $query3 = mysqli_query($conn, $sql3);

    $sql4 = "DELETE FROM `image` WHERE productID = $a";
    $query4 = mysqli_query($conn, $sql4);

    $sql5 = "DELETE FROM `productorders` WHERE productID = $a";
    $query5 = mysqli_query($conn, $sql5);

    $sql1 = "DELETE FROM `product` WHERE productID = $a";
  
    $query1 = mysqli_query($conn, $sql1);
    if (!$query1) {
      echo "<script>alert('".mysqli_error($conn). "')</script>";
    }
    else{ 
      echo "<script>alert('xóa sản phẩm thành công.')</script>";
      echo "<script>window.location='adcategory.php'</script>";
      } 
  }
  else
    echo "<script>alert('".mysqli_error($conn). "')</script>";
