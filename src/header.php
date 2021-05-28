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
          $conn->set_charset("utf8");
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
          <a id="home_name" href="index.php">STORE online</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
            $getdata = "SELECT categoryID, categoryName FROM category";
            $query1 = mysqli_query($conn, $getdata);
            if ($query1) {
              while ($row = mysqli_fetch_assoc($query1)) {
                echo "<li><a href='category.php?idcatogory=" . $row["categoryID"] . "'>" . $row["categoryName"] . "</a></li>";
              }
            }
            //$conn->close();
            ?>
          </ul>
        </li>

        <li>
          <a href="discount.php">Khuyến mãi</a>
        </li>
        <li>
          <a href="customer.php">Hỗ trợ khách hàng</a>
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