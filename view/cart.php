<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Giỏ hàng</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>

<body>

  <?php

  if (isset($_POST['updataCart'])) {
    foreach ($_POST['qty'] as $key => $value) {
      if (($value == 0) and (is_numeric($value))) {
        unset($_SESSION['cart'][$key]);
      } elseif (($value > 0) and (is_numeric($value))) {
        $_SESSION['cart'][$key] = $value;
      }
    }
    header("location:cart.php");
  }
  ?>
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="#">Giỏ hàng</a></li>
    </ol>
  </div>
  <div class="container">
    <div class="row">
      <?php
      $ok = 1;
      if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $k => $v) {
          if (isset($k)) {
            $ok = 2;
          }
        }
      }
      if ($ok == 2) {
        echo "<form action='cart.php' method='post'>";
        foreach ($_SESSION['cart'] as $key => $value) {
          $item[] = $key;
        }
        $str = implode(",", $item);

        include '../libs/connect.php';
        $mysqli = new mysqli("localhost", "root", "", "webdata5");

        $sql = "select * from product where productID in ($str)";
        $query = mysqli_query($mysqli, $sql);

        $total = 0;
        $totalDiscount = 0;
        echo "<div class='col-lg-9 col-md-9 col-sm-9'>";
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>";
        echo "Sản phẩm trong giỏ hàng";
        echo "</th>";
        echo "<th>";
        echo "Giá mua";
        echo "</th>";
        echo "<th>";
        echo "Số lượng";
        echo "</th>";
        echo "<th>";
        echo "Giả giảm";
        echo "</th>";
        echo "<th>";
        echo "Thành tiền";
        echo "</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($query)) {
          $soluong = $_SESSION['cart'][$row['productID']];
          $tongtien = $_SESSION['cart'][$row['productID']] * $row['price'];
          $discount = $_SESSION['cart'][$row['productID']] * $row['discount'];
          echo "<tr>";
          echo "<td>";
          echo "<img src='../img/$row[image]' style='float:left; width:120px; height:150px' alt='iphone'>";
          echo "<h4 style='color:green'>$row[productName] </h4>";
          echo "<p><a href='../action/delcart.php?productid=$row[productID]'>Xóa </a></p>";
          echo "</td>";
          echo "<td>";
          echo "$row[price]" . "đ";
          echo "</td>";
          echo "<td>";
          echo "<p> <input type='text' name='qty[$row[productID]]' size='4' value='$soluong'>";
          echo "</td>";
          echo "<td>";
          echo "$row[discount]" . "đ";
          echo "</td>";
          echo "<td>";
          echo "$tongtien" . "đ";
          echo "</td>";
          echo "</tr>";
          $total += $tongtien;
          $totalDiscount += $discount;
        }
        $mysqli->close();

        echo "</table>";
        echo "<a href='index.php' style='font-weight:bold' class='btn btn-warning'>TIẾP TỤC MUA HÀNG</a>";

        echo "</div>";
        echo "<div class='col-lg-3 col-md-3 col-sm-12'>";
        echo "<div class='single-product-widget'>";
        echo "<div class='list-group-item'>";
        echo "<p style='color:blue; font-weight: bold;font-size: 16px;margin-left: 2px;'>Thông tin thanh toán</p>";
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<th>Tổng cộng: </th>";
        echo "<th>$total" . "đ</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Giảm giá </td>";
        echo "<td>$totalDiscount" . "đ</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='color:blue; font-weight: bold;font-size: 15px'>Thành tiền: </td>";
        echo "<td style='color:red; font-weight: bold;font-size: 15px'>" . ($total - $totalDiscount) . "đ</td>";
        echo "</tr>";
        echo "</table>";
        echo "<p style='text-align: center'><a href='../view/checkout.php' style='font-weight:bold' class='btn btn-danger' >TIẾN HÀNH ĐẶT HÀNG</a></p>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      } else {
        echo "<p align='center' style='color:#ec6b0b' >Bạn Không Có Món Hàng Nào Trong Giỏ Hàng<br /><a href='index.php'>Quay Trở Về Trang Chủ Mua Ngay</a></p>";
        echo "<img style='display:block;margin-left:auto;margin-right:auto' src='../img/empty_cart.png' alt='empty'>";
        echo "</div>";
      }

      ?>



      <br /><br />



    </div>
  </div>
  </div>
  <br>

  <?php include '../src/footer.php' ?>


</body>

</html>