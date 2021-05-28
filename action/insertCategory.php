<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Thêm loại sản phẩm</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

  <style type="text/css">
    table,
    tr,
    td {
      border: 1px solid gray;
      border-collapse: collapse;
      text-align: center;
    }

    .tieude {
      border: 1px solid gray;
      text-align: center;
      width: 5%;
    }
  </style>
</head>

<body>

  <?php include '../libs/connect.php';
  session_start() ?>
  <div class="container">
    <div class="col-md-12">
      <div class="status">
        <ul>
          <?php
          if (empty($_SESSION['user_id'])) {
          ?>

            <li><a href="register.php">Đăng kí</a></li>
            <li><a href="login.php">Đăng nhập</a></li>
          <?php
          } else {
            $user_id = intval($_SESSION['user_id']);
            $sql_query = mysqli_query($conn, "SELECT * FROM user WHERE id='{$user_id}'");
            $member = mysqli_fetch_array($sql_query);


            echo "<p style='text-align:right;color:#dc1b7b;font-weight:bold;font-style:italic'>Hello " . $member['username'] . "</p>";

            echo "<li><a href='../view/account.php'>Tài khoản</a></li>";
            if ($member['level'] == "2") {
              echo "<li><a href='../view/cus_bill.php'>Đơn hàng</a></li>";
            }

            if ($member['level'] == "1") {
              echo "<li><a href='../view/adcategory.php'>Trang quản trị</a></li>";
            }
            echo "<li><a href='../action/log_out.php'>Thoát</a></li>";
          }
          ?>
          <?php
          $ok = 1;
          if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $k => $v) {
              if (isset($k)) {
                $ok = 2;
              }
            }
          }

          if ($ok != 2) {
            echo "<li><a href='cart.php'>Giỏ hàng(0) <i style='color:orange;'' class='fa fa-shopping-cart'></i></a></li>";
          } else {
            $items = $_SESSION['cart'];
            echo "<li><a href='cart.php'>Giỏ hàng(" . count($items) . ") <i style='color:orange;'' class='fa fa-shopping-cart'></i></a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <!-- Logo and responsive toggle -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li>
            <a id="home_name" href="../view/index.php">STORE online</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php
              echo "<li><a href='../view/category.php?idcatogory=1'>Sony</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=2'>iPhone</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=3'>Samsung</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=4'>Asus</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=5'>Oppo</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=6'>HTC</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=7'>Nokia</a></li>";
              echo "<li><a href='../view/category.php?idcatogory=8'>Lenovo</a></li>";
              ?>
            </ul>
          </li>

          <li>
            <a href="../view/discount.php">Khuyến mãi</a>
          </li>
          <li>
            <a href="../view/customer.php">Hỗ trợ khách hàng</a>
          </li>
        </ul>

        <!-- Search -->
        <form class="navbar-form navbar-right" role="search" action="../view/search.php" method="POST">
          <div class="form-group">
            <input type="text" name="tim" class="form-control">
          </div>
          <input type="submit" class="btn btn-default" name="submit" value="Tìm kiếm">

        </form>



      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <?php include '../libs/connect.php' ?>
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="../view/index.php">Trang chủ</a></li>
      <li><a href="#">Sản Phẩm</a></li>

    </ol>
  </div>
  <div class="container">
    <div class="col-md-3">
      <div class="categories">

        <ul>
          <h3>QUẢN LÝ</h3>
          <li><a href="../view/adcategory.php">Sản phẩm</a></li>
          <li><a href="../view/adcustomer.php">Khách hàng</a></li>
          <li><a href="../view/bill.php">Đơn hàng</a></li>
          <li><a href="../view/contact.php">Phản hồi</a></li>

        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <h3 style="text-align:center;font-weight:bold;color:orange">THÊM LOẠI SẢN PHẨM</h3>

      <br>
      <br>
      <?php
      include '../libs/connect.php';
      ?>

      <form class="form-horizontal" action="" method="POST">

        <div class="form-group">
          <label for="name" class="col-lg-3 control-label">Loại sản phẩm</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="name" id="name" placeholder="nhập tên loại sản phẩm">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-8 col-md-offset-3 padding-left-0 padding-top-20">
            <input class="btn btn-success" type="submit" name="submit" value="THÊM">
          </div>
        </div>
      </form>

      <?php
      if (isset($_POST['submit'])) {
        $conn->set_charset("utf8");

        $name = mysqli_real_escape_string($conn, $_POST['name']);

        if ($name != '') {
          $sql = "insert into category(categoryID ,categoryName) values(NULL, '$name')";

          $query = mysqli_query($conn, $sql);

          if ($query) {
            echo "<script> 
                alert('thêm loại sản phẩm thành công');
                window.location='../view/adcategory.php';
              </script>";
          } else
            echo mysqli_error($conn);
        } else
          echo "<script>alert('insert error')</script>";
      }
      ?>

    </div>
  </div>
  <?php include '../src/footer.php' ?>


</body>

</html>