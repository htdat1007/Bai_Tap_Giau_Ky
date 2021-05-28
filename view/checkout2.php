<!DOCTYPE html>
<html lang="en">

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
  <link href="../css/bank.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <style type="text/css">
    body {
      margin-top: 20px;
    }
  </style>

</head>

<body>
  <?php
  include '../src/header.php';
  include '../libs/connect.php';
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

  ?>
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="cart.php">Giỏ hàng</a></li>
      <li><a href="#">Đặt hàng</a></li>
    </ol>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="col-md-12" id="step-1">
          <div class="row">
            <div class="col-md-10-offset-2">
              <div class="single-product-widget">
                <div class="list-group-item">


                  <form class="form-horizontal" action="" method="post">
                    <p style="color:blue; font-size: 16px;font-weight: bold;">Vui lòng chọn 1 trong 2 hình thức thanh toán sau:</p>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <div class="col-md-12 col-sm-12">
                          <input class="resize" type="radio" name="payment" value="r1"><label class="gender">Thanh toán bằng tiền mặt</label>
                        </div>

                        <div class="col-md-12 col-sm-12">
                          <input class="resize" type="radio" name="payment" value="r2">
                          <label class="gender">Thanh toán trực tuyến (ATM, Visa, Master)</label>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12">
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/agribank.jpg"></a>
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/logo_donga-bank.jpg"></a>
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/ocb.jpg"></a>
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/pvcombank-logo.png"></a>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12">
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/logoquandoi.jpg"></a>
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/logo-NH-ACB.png"></a>
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/vietcombank-logo.jpg"></a>
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <a href="#"><img class="bank" alt="abc" src="../bank/vietinbank.jpg"></a>
                        </div>
                      </div>

                      <div class="col-sm-offset-9 col-sm-5">
                        <input name="submit" type="submit" style="font-weight:bold" class="btn btn-success pay" value="THANH TOÁN">

                        <a href="index.php" style="font-weight:bold" class="btn btn-danger pay">HỦY</a>
                      </div>
                    </div>
                  </form>
                  <?php
                  if (isset($_POST['submit'])) {
                    if (!empty($_POST['payment'])) {

                      if ($_POST['payment'] == 'r1' || $_POST['payment'] == 'r2') {
                        $id = empty($_SESSION['user_id']) ? 0 : $_SESSION['user_id'];
                        $sql = "select * from orders where is_customer = $id";
                        $query = mysqli_query($conn, $sql);
                        if ($query) {
                          while ($row = mysqli_fetch_array($query)) {
                            $a = $row['is_customer'];
                            $query1 = mysqli_query($conn, "update orders set is_pay = 'đã thanh toán' where is_customer='$a'");
                          }
                          echo "<script>alert('thanh toán thành công.')</script>";
                          echo "<script>window.location='success.php'</script>";
                        }
                      }
                    } else {
                      echo "<script>alert('vui lòng chọn hình thức thanh toán.')</script>";
                    }
                  }
                  if (isset($_POST['reset'])) {
                    echo "<script>window.location='index.php'</script>";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include '../src/footer.php' ?>


</body>

</html>