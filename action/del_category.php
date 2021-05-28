<?php
include '../libs/connect.php';
  $cateId = (int)$_GET['categoryid'];
  $sql = "SELECT * FROM category c, product p WHERE p.categoryID = c.categoryID AND c.categoryID = $cateId";
  $query = $conn->query($sql);
  if(mysqli_num_rows($query) > 0){
    while($row=mysqli_fetch_array($query)){
      $a = $row['productID'];
      $sql2 = "DELETE FROM `comment` WHERE productID = $a";
      $query2 = mysqli_query($conn, $sql2);
      $sql3 = "DELETE FROM `thongso` WHERE productID = $a";
      $query3 = mysqli_query($conn, $sql3);
      $sql4 = "DELETE FROM `image` WHERE productID = $a";
      $query4 = mysqli_query($conn, $sql4);
      $sql5 = "DELETE FROM `productorders` WHERE productID = $a";
      $query5 = mysqli_query($conn, $sql5);
      $sql1 = "DELETE FROM `product` WHERE productID = $a";
      $query1 = mysqli_query($conn, $sql1);
    }
  }
  $sql_cate = "DELETE FROM category WHERE categoryID = $cateId";
  $query_cate = $conn->query($sql_cate);
  if(!$query_cate)
    echo "<script>alert('".mysqli_error($conn). "')</script>";
  else{ 
    echo "<script>alert('Xóa loại sản phẩm thành công.')</script>";
    echo "<script>window.location = '../view/adcategory.php'</script>";
  }
