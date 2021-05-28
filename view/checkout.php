<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Checkout</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <style type="text/css">
    body {
      margin-top: 20px;
    }
  </style>

</head>

<body>

  <?php
  include '../src/header.php'

  ?>

  <?php
  include '../libs/connect.php';
  $mysqli = new mysqli("localhost", "root", "", "webdata5");
  mysqli_report(MYSQLI_REPORT_ERROR);
  $user_id = empty($_SESSION['user_id']) ? 0 : (int)$_SESSION['user_id'];
  if ($user_id != 0) {
    $ktra = $user_id;
  } else {
    $ktra = $user_id;
  }
  $conn->set_charset("utf8");
  $sql = "select * from User where id = $user_id";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $row = mysqli_fetch_array($query);

  ?>

    <div class="container">
      <ol class="breadcrumb">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="category.php">Giỏ hàng</a></li>
        <li><a href="#">Đặt hàng</a></li>
      </ol>
    </div>

    <div class="container">

      <div class="row form-group">
        <div class="col-xs-12">
          <ul class="nav nav-pills nav-justified thumbnail setup-panel">
            <li class="active"><a href="#step-1">
                <h4 class="list-group-item-heading">BƯỚC 1</h4>
                <p class="list-group-item-text">ĐẶT HÀNG</p>
              </a></li>
            <li class="disabled"><a href="#step-2">
                <h4 class="list-group-item-heading">BƯỚC 2</h4>
                <p class="list-group-item-text">THANH TOÁN</p>
              </a></li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="col-md-12" id="step-1">
            <div class="row">
              <div class="col-md-7">
                <div class="single-product-widget">
                  <div class="list-group-item">

                    <form class="form-horizontal" action="" method="post">
                      <p class="form_info">1. Thông tin khách hàng:</p>
                      <div class="form-group">
                        <label for="nameUser" class="col-sm-2 control-label">Tên</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="Name" value="<?php echo $row['fullname'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Số điện thoại</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="phone" name="phone" placeholder="0123456789" value="<?php echo $row['phone'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="addr" class="col-sm-2 control-label">Địa chỉ</label>
                        <div class="col-sm-10">
                          <textarea id="addr" name="addr" class="form-control" placeholder="Type your address ..."><?php echo $row['address']; ?>
                        </textarea>
                        </div>
                      </div>
                    <?php
                  }
                    ?>
                    <div class="form-group">
                      <div class="col-sm-offset-9 col-sm-10 col-md-3">
                        <input class="btn btn-warning pay" style="font-weight:bold" type="submit" name="submit" value="ĐẶT HÀNG" />
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>


              <?php
              foreach ($_SESSION['cart'] as $key => $value) {
                $item[] = $key;
              }
              $str = implode(",", $item);

              $sql = "select * from product where productID in ($str)";
              $query = $mysqli->query($sql);

              $total = 0;
              $totalDiscount = 0;
              echo "<div class='col-md-5'>";
              echo "<div class='single-product-widget'>";
              echo "<div class='list-group-item'>";
              echo "<p style='color:blue; font-weight: bold;font-size: 16px;margin-left: 2px;''>Thông tin sản phẩm</p>";
              echo "<table class='table table-striped'>";
              echo "<tr>";
              echo "<th>Tên sản  </th>";
              echo "<th>Số lượng </th>";
              echo "<th>Giá</th>";
              echo "<th>Giảm</th>";
              echo "</tr>";

              while ($row = mysqli_fetch_array($query)) {
                $soluong = $_SESSION['cart'][$row['productID']];
                $tongtien = $_SESSION['cart'][$row['productID']] * $row['price'];
                $productName = $row['productName'];
                $discount = $_SESSION['cart'][$row['productID']] * $row['discount'];

                echo "<tr>";
                echo "<td>$row[productName]</td>";
                echo "<td>$soluong</td>";
                echo "<td>$tongtien</td>";
                echo "<td>$discount</td>";
                echo "</tr>";

                $total += $tongtien;
                $totalDiscount += $discount;
              }
              $totalLast = $total - $totalDiscount;
              echo "<tr>";
              echo "<td style='color:blue; font-weight: bold;font-size: 15px'>Tổng cộng(bao gồm VAT)</td>";
              echo "<td> </td>";
              echo "<td> </td>";
              echo "<td style='color:red; font-weight: bold;font-size: 15px'>$totalLast</td>";
              echo "</tr>";
              echo "</table>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              if (isset($_POST['submit'])) {
                //get the form data
                $nameUser = mysqli_real_escape_string($conn, $_POST['nameUser']);
                $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                $mail = mysqli_real_escape_string($conn, $_POST['email']);
                $address = mysqli_real_escape_string($conn, $_POST['addr']);
                $now = getdate();
                $time =  $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];
                $error = array();
                $check1 = $check6 = $check7 = $check8 = false;
                // end get the form data

                //Kiem tra loi
                if (strlen($nameUser) < 5 || strlen($nameUser) > 30) {
                  $error[] = "Tên đăng nhập phải từ 5-50 ký tự.";
                } else {
                  $check1 = true;
                }
                if (empty($mail)) {
                  $error[] = "Email không được bỏ trống.";
                } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                  $error[] = "Email phải theo định dạng <sth>@<sth>.<sth>";
                } else {
                  $check6 = true;
                }

                if (empty($phone)) {
                  $error[] = "Điện thoại không được bỏ trống.<br/>";
                } else if (is_numeric($phone) && strlen($phone) > 11) {
                  $error[] = "Số điện thoại không hợp lệ.";
                } else {
                  $check7 = true;
                }

                if (empty($address)) {
                  $error[] = " Địa chỉ không được bỏ trống.";
                } else if (strlen($address) > 500) {
                  $error[] = "Địa chỉ không được lớn hơn 500 ký tự.";
                } else {
                  $check8 = true;
                }
                // End Kiem tra loi
                $pay = mysqli_real_escape_string($conn, 'đang chờ xử lý');
                //Push vao db
                if ($check1 && $check6 && $check7 && $check8) {
                  mysqli_set_charset($mysqli, "utf8");
                  $sql = "INSERT INTO orders (fullname, email,phone,address,date_buy,total,is_customer,is_pay) 
                VALUES ('$nameUser','$mail','$phone','$address','$time','$totalLast','$ktra','$pay')";
                  $last_id = 0;
                  if ($mysqli->query($sql) === TRUE) {
                    $last_id = $mysqli->insert_id;
                  } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                  }
                  echo "<script>alert('" . $pay . "')</script>";
                  $sql = "select * from product where productID in ($str)";
                  $query = $mysqli->query($sql);
                  while ($row = mysqli_fetch_array($query)) {

                    $soluong = $_SESSION['cart'][$row['productID']];
                    $productName = $row['productID'];
                    $sql = "INSERT INTO productorders (productID,idOther,amount) 
                  VALUES ('$productName','$last_id','$soluong')";
                    if ($mysqli->query($sql) === TRUE) {
                      $amountsold = $row['soluongbanduoc'] + $soluong;
                      $sql = "UPDATE product SET soluongbanduoc = $amountsold WHERE productID = $row[productID]";
                      $mysqli->query($sql);
                    } else {
                      echo "Error: " . $sql . "<br>" . $mysqli->error;
                    }
                  }
                  echo '<script language="Javascript"> 
                document.location.replace("../action/delcart.php?productid==0"); 
              </script>';
                }
                //End Push vao db
              }
              ?>

              <div style="width: 400px; margin-top: 10px;margin-bottom: 30px; padding: 20px;">
                <?php if (isset($error) && count($error) > 0) { ?>
                  <tr>
                    <td>
                    </td>
                    <td>
                      <ul style="list-style-position: inside">
                        <?php
                        echo "<p style='color:red; font-weight:bold; font-size:16px;'>Information Error!</p>";
                        foreach ($error as $loi) : ?>
                          <li><?php echo  $loi; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </td>
                  </tr>
                <?php } ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include '../src/footer.php' ?>




</body>

</html>