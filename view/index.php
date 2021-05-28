<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="storeonline.me-Trang web shopping thiết bị điện tử">
  <meta name="robots" content="noindex, nofollow" />
  <meta name="keywords" content="iphone, sony, điện thoại, lenovo, oppo, asus, shopping, điện tử" />
  <meta http-equiv="refresh" content="30">
  <meta name="author" content="">

  <title>Trang chủ</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


</head>

<body>

  <!-- Page Content -->
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="header_slide">
        <div class="categories">

          <ul>
            <h3>DANH MỤC</h3>
            <?php
            include '../libs/connect.php';
            //lấy sản phẩm trong database
            $getdata = "SELECT categoryID, categoryName FROM category";
            $query1 = mysqli_query($conn, $getdata);
            if ($query1) {
              while ($row = mysqli_fetch_assoc($query1)) {
                echo "<li><a href='category.php?idcatogory=" . $row["categoryID"] . "'>" . $row["categoryName"] . "</a></li>";
              }
            }

            ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- Jumbotron Header -->
    <header class="col-md-9 col-sm-12">
      <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
          <ul class="" id="bxslider-home4">
            <li>
              <img src="../img/h4-slide.png" alt="Slide">
              <div class="caption-group">
                <h2 class="caption title">
                  iPhone <span class="primary">6 <strong>Plus</strong></span>
                </h2>
                <h4 class="caption subtitle">Dual SIM</h4>
                <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
              </div>
            </li>
            <li><img src="../img/banner4.jpg" alt="Slide">
            </li>
            <li><img src="../img/banner5.jpg" alt="Slide">
            </li>
            <li><img src="../img/h4-slide4.png" alt="Slide">
              <div class="caption-group">
                <h2 class="caption title">
                  Apple <span class="primary">Store <strong>Ipod</strong></span>
                </h2>
                <h4 class="caption subtitle">& Phone</h4>
                <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
              </div>
            </li>
          </ul>
        </div>
        <!-- ./Slider -->
      </div> <!-- End slider area -->
    </header>


  </div>

  <br><br><br>

  <div class="container">
    <div class="col-md-12">

      <div class="col-md-3 col-lg-3 serv">
        <img src="../img/service-1.png" alt="">
        <h3><a href="#">Free Ship</a></h3>
        <span class="term">Order over $300</span>
      </div>
      <div class="col-md-3 serv">
        <img src="../img/service-2.png" alt="">
        <h3><a href="#">30 Days</a></h3>
        <span class="term">Easy Return</span>
      </div>
      <div class="col-md-3 serv">
        <img src="../img/service-3.png" alt="">
        <h3><a href="#">Call Us</a></h3>
        <span class="term">(084) 1900 0000</span>
      </div>
      <div class="col-md-3 serv">
        <img src="../img/service-4.png" alt="">
        <h3><a href="#">Secured</a></h3>
        <span class="term">Checkout</span>
      </div>

    </div>
  </div>

  <br><br>
  <?php
  $tab = isset($_GET['tab']) ? $_GET['tab'] : 1;
  ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9 col-md-9">
        <ul class="nav nav-tabs">

          <?php
          echo ($tab == '1') ?  '<li class="active"><a data-toggle="tab" href="#home">Sản phẩm HOT</a></li>' :  '<li><a data-toggle="tab" href="#home">Sản phẩm HOT</a></li>';
          echo ($tab == '2') ? '<li class="active"><a data-toggle="tab" href="#discount">Khuyến mãi</a></li>' : '<li><a data-toggle="tab" href="#discount">Khuyến mãi</a></li>';
          echo ($tab == '3') ? '<li class="active"><a data-toggle="tab" href="#new">Sản phẩm mới</a></li>' : '<li><a data-toggle="tab" href="#new">Sản phẩm mới</a></li>'
          ?>

        </ul>
      </div>
    </div>
    <!-- Title -->
    <div class="tab-content ">
      <?php
      echo ($tab == '1') ? ' <div id="home" class="tab-pane fade in active">' : '<div id="home" class="tab-pane fade">';
      ?>
      <div class="row">
        <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
          <br> <br>

          <!--show san pham len san pham HOT-->

          <?php
          include '../libs/connect.php';
          $mysqli = new mysqli("localhost", "root", "", "webdata5");
          $conn->set_charset("utf8");
          //lấy sản phẩm trong database
          $getdata = "select count(productID) as total from product where soluongbanduoc>=10";
          $query1 = $mysqli->query($getdata);

          $row1 = mysqli_fetch_assoc($query1);
          $total_records = $row1['total'];

          //TÌM LIMIT VÀ CURRENT_PAGE
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $limit = 6;

          //TÍNH TOÁN TOTAL_PAGE VÀ START
          // tổng số trang
          $total_page = ceil($total_records / $limit);

          // Giới hạn current_page trong khoảng 1 đến total_page
          if ($current_page > $total_page) {
            $current_page = $total_page;
          } else if ($current_page < 1) {
            $current_page = 1;
          }

          // Tìm số record bắt đầu của mỗi trang
          $start = ($current_page - 1) * $limit;

          //lấy dữ liệu cho từng trang
          $sql = "select * from product WHERE soluongbanduoc>=10  order by soluongbanduoc desc LIMIT $start, $limit";
          $query = $mysqli->query($sql);

          //var_dump($query);

          if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {

              echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
              echo "<div class='product-item'>";
              echo "<div class='img-wrapper' style='height:25em'>";
              echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
              echo "<div>";
              echo "<br>";
              $id = (int)$row['productID'];
              $sql1 = "select * from thongso where productID = $id";
              $query1 = mysqli_query($conn, $sql1);
              while ($row1 = mysqli_fetch_array($query1)) {
                echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>Hệ điều hành: " . $row1['HDD'] . "</p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>Camera sau: " . $row1['CMRSau'] . "</p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
                echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
              }
              echo "<br>";
              echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Chi tiết</a>";
              echo "</div>";
              echo "</div>";
              echo "<h3><a href='detail.php?item=$row[productID]'>$row[productName]</a></h3>";
              echo "<div class='price'>$row[price]" . "đ</div>";
              echo "<a href='../action/addcart.php?item=$row[productID]' class='btn btn-default add'>MUA HÀNG</a>";
              echo "</div>";
              echo "</div>";
            }
          }


          ?>
          <!--/show san pham len san pham HOT-->


          <div class="col-md-12 col-sm-12 col-xs-12 hero-feature">
            <ul class="pager">


              <?php
              //HIỂN THỊ PHÂN TRANG
              // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
              if ($current_page > 1 && $total_page > 1) {
                echo '<li><a href="index.php?tab=1&page=' . ($current_page - 1) . '">Trang trước</a></li>';
              }

              // Lặp khoảng giữa
              for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                  echo '<li><a><span>' . $i . '</span></a></li>';
                } else {
                  $mysqli->set_charset("utf8");
                  echo '<li><a href="index.php?tab=1&page=' . $i . '">' . $i . '</a></li>';
                }
              }

              // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
              if ($current_page < $total_page && $total_page > 1) {
                $mysqli->set_charset("utf8");
                echo '<li><a href="index.php?tab=1&page=' . ($current_page + 1) . '">Trang sau</a></li>';
              }
              ?>

            </ul>
          </div>
        </div>

        <div class=" col-xs-12 col-sm-12 col-lg-3 col-md-3">
          <div class="single-product-widget">
            <div class="list-group">
              <a href="#" class="list-group-item active">Bán chạy nhất</a>
              <div class="list-group-item">
                <?php
                $sql = "select * from product order by soluongbanduoc desc";
                $query = $mysqli->query($sql);
                if (mysqli_num_rows($query) > 0) {
                  $count = 0;
                  while (($row = mysqli_fetch_array($query)) && $count < 3) {
                    $count++;
                    echo "<div class='single-wid-product'>";
                    echo "<a href='detail.php?item=$row[productID]'><img src='../img/$row[image]' alt='' class='product-thumb'></a>";
                    echo "<h2><a href='detail.php?item=$row[productID]'>$row[productName]</a></h2>";
                    echo "<div class='product-wid-rating'>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "<i class='fa fa-star'></i>";
                    echo "</div>";
                    echo "<div class='product-wid-price'>";
                    echo "<p>$row[price]" . "đ</p>";
                    echo "</div>  ";
                    echo "</div>";
                    echo "<hr>";
                  }
                }
                ?>
              </div>
            </div>
          </div>

          <br>

          <div class="list-group">
            <a href="#" class="list-group-item active">Sản phẩm mới</a>
            <div class="list-group-item">
              <?php
              $mysqli->set_charset("utf8");
              $sql = "select * from product order by dateupdate desc";
              $query = $mysqli->query($sql);
              if (mysqli_num_rows($query) > 0) {
                $count = 0;
                while (($row = mysqli_fetch_array($query)) && $count < 3) {
                  $count++;
                  echo "<div class='single-wid-product'>";
                  echo "<a href='detail.php?item=$row[productID]'><img width='2em' height='2em' src='../img/$row[image]' alt='image' class='product-thumb'></a>";
                  echo "<h2><a href='detail.php?item=$row[productID]'>$row[productName]</a></h2>";
                  echo "<div class='product-wid-rating'>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "</div>";
                  echo "<div class='product-wid-price'>";
                  echo "<p>$row[price]" . "đ</p>";
                  echo "</div>  ";
                  echo "</div>";
                  echo "<hr>";
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    echo '<div id="discount"' . ($tab == '2' ? 'class="tab-pane fade in active"' : 'class="tab-pane fade"') . '>';
    ?>
    <div class="row">
      <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
        <br><br>
        <br> <br>

        <!--show san pham len san pham khuyen-->

        <?php
        include '../libs/connect.php';
        $mysqli = new mysqli("localhost", "root", "", "webdata5");
        $conn->set_charset("utf8");
        //lấy sản phẩm trong database
        $getdata = "select count(discount) as total from product where discount > 0";
        $query1 = $mysqli->query($getdata);

        $row1 = mysqli_fetch_assoc($query1);
        $total_records = $row1['total'];

        //TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['pagekm']) ? $_GET['pagekm'] : 1;
        $limit = 6;

        //TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);

        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
          $current_page = $total_page;
        } else if ($current_page < 1) {
          $current_page = 1;
        }

        // Tìm số record bắt đầu của mỗi trang
        $start = ($current_page - 1) * $limit;

        //lấy dữ liệu cho từng trang
        $sqld = "select * from product where discount > 0 order by discount desc LIMIT $start, $limit";
        $queryd = $mysqli->query($sqld);

        //var_dump($query);

        if (mysqli_num_rows($queryd) > 0) {
          while ($rowd = mysqli_fetch_array($queryd)) {

            echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
            echo "<div class='product-item'>";
            echo "<div class='img-wrapper' style='height:25em'>";
            echo "<img src='../img/$rowd[image]'class='img-responsive' alt='iphone'>";
            echo "<div>";
            echo "<br>";
            $id = (int)$rowd['productID'];
            $sqld1 = "select * from thongso where productID = $id";
            $queryd1 = mysqli_query($conn, $sqld1);
            while ($rowd1 = mysqli_fetch_array($queryd1)) {
              echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $rowd1['manhinh'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Hệ điều hành: " . $rowd1['HDD'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $rowd1['CMRTruoc'] . ", </p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Camera sau: " . $rowd1['CMRSau'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $rowd1['RAM'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $rowd1['ROM'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $rowd1['thesim'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $rowd1['dungluongPIN'] . "</p>";
            }
            echo "<br>";
            echo "<a href='detail.php?item=$rowd[productID]' class='btn btn-default fancybox-fast-view'>Chi tiết</a>";
            echo "</div>";
            echo "</div>";
            echo "<h3><a href='detail.php?item=$rowd[productID]'>$rowd[productName]</a></h3>";
            echo "<div class='price'>$rowd[price]" . "đ</div>";
            echo "<a href='../action/addcart.php?item=$rowd[productID]' class='btn btn-default add'>MUA NGAY</a>";
            echo "</div>";
            echo "</div>";
          }
        }


        ?>
        <!--/show san pham len san pham km-->


        <div class="col-md-12 col-sm-12 col-xs-12 hero-feature">
          <ul class="pager">


            <?php
            //HIỂN THỊ PHÂN TRANG
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1) {
              echo '<li><a href="index.php?tab=2&pagekm=' . ($current_page - 1) . '">Trang trước</a></li>';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
              // Nếu là trang hiện tại thì hiển thị thẻ span
              // ngược lại hiển thị thẻ a
              if ($i == $current_page) {
                echo '<li><a><span>' . $i . '</span></a></li>';
              } else {
                echo '<li><a href="index.php?tab=2&pagekm=' . $i . '">' . $i . '</a></li>';
              }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
              echo '<li><a href="index.php?tab=2&pagekm=' . ($current_page + 1) . '">Trang sau</a></li>';
            }
            ?>

          </ul>
        </div>
      </div>

      <div class=" col-xs-12 col-sm-12 col-lg-3 col-md-3">
        <div class="single-product-widget">
          <div class="list-group">
            <a href="#" class="list-group-item active">Bán chạy nhất</a>
            <div class="list-group-item">
              <?php
              $sql1 = "select * from product order by soluongbanduoc desc";
              $query1 = $mysqli->query($sql1);
              if (mysqli_num_rows($query1) > 0) {
                $count = 0;
                while (($row = mysqli_fetch_array($query1)) && $count < 3) {
                  $count++;
                  echo "<div class='single-wid-product'>";
                  echo "<a href='detail.php?item=$row[productID]'><img src='../img/$row[image]' alt='$row[productName]' class='product-thumb'></a>";
                  echo "<h2><a href='detail.php?item=$row[productID]'>$row[productName]</a></h2>";
                  echo "<div class='product-wid-rating'>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "<i class='fa fa-star'></i>";
                  echo "</div>";
                  echo "<div class='product-wid-price'>";
                  echo "<p>$row[price]" . "đ</p>";
                  echo "</div>  ";
                  echo "</div>";
                  echo "<hr>";
                }
              }
              ?>
            </div>
          </div>
        </div>

        <br>
        <br>
        <br>
        <div class="list-group">
          <a href="#" class="list-group-item active">Sản phẩm mới</a>
          <div class="list-group-item">
            <?php
            $mysqli->set_charset("utf8");
            $sql = "select * from product order by dateupdate desc";
            $query = $mysqli->query($sql);
            if (mysqli_num_rows($query) > 0) {
              $count = 0;
              while (($row = mysqli_fetch_array($query)) && $count < 3) {
                $count++;
                echo "<div class='single-wid-product'>";
                echo "<a href='detail.php?item=$row[productID]'><img width='2em' height='2em' src='../img/$row[image]' alt='' class='product-thumb'></a>";
                echo "<h2><a href='detail.php?item=$row[productID]'>$row[productName]</a></h2>";
                echo "<div class='product-wid-rating'>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "</div>";
                echo "<div class='product-wid-price'>";
                echo "<p>$row[price]" . "đ</p>";
                echo "</div>  ";
                echo "</div>";
                echo "<hr>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  echo '<div id="new"' . ($tab == '3' ? 'class="tab-pane fade in active"' : 'class="tab-pane fade"') . '>';
  ?>
  <div class="row">
    <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
      <br><br>
      <!--1-->
      <br> <br>

      <!--show san pham len san pham moi-->

      <?php
      include '../libs/connect.php';
      $mysqli = new mysqli("localhost", "root", "", "webdata5");
      $conn->set_charset("utf8");
      //lấy sản phẩm trong database
      $getdata = "select count(productID) as total from product";
      $query1 = $mysqli->query($getdata);

      $row1 = mysqli_fetch_assoc($query1);
      $total_records = $row1['total'];

      //TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['pagen']) ? $_GET['pagen'] : 1;
      $limit = 6;

      //TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);

      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page) {
        $current_page = $total_page;
      } else if ($current_page < 1) {
        $current_page = 1;
      }

      // Tìm số record bắt đầu của mỗi trang
      $start = ($current_page - 1) * $limit;

      //lấy dữ liệu cho từng trang
      $sql = "select * from product order by dateupdate desc LIMIT $start, $limit";
      $query = $mysqli->query($sql);

      //var_dump($query);

      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {

          echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
          echo "<div class='product-item'>";
          echo "<div class='img-wrapper' style='height:25em'>";
          echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
          echo "<div>";
          echo "<br>";
          $id = (int)$row['productID'];
          $sql1 = "select * from thongso where productID = $id";
          $query1 = mysqli_query($conn, $sql1);
          while ($row1 = mysqli_fetch_array($query1)) {
            echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>Hệ điều hành: " . $row1['HDD'] . "</p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>Camera sau: " . $row1['CMRSau'] . "</p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
            echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
          }
          echo "<br>";
          echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Chi tiết</a>";
          echo "</div>";
          echo "</div>";
          echo "<h3><a href='detail.php?item=$row[productID]'>$row[productName]</a></h3>";
          echo "<div class='price'>$row[price]" . "đ</div>";
          echo "<a href='../action/addcart.php?item=$row[productID]' class='btn btn-default add'>MUA NGAY</a>";
          echo "</div>";
          echo "</div>";
        }
      }


      ?>
      <!--/show san pham len san pham HOT-->


      <div class="col-md-12 col-sm-12 col-xs-12 hero-feature">
        <ul class="pager">


          <?php
          //HIỂN THỊ PHÂN TRANG
          // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
          if ($current_page > 1 && $total_page > 1) {
            echo '<li><a href="index.php?tab=3&pagen=' . ($current_page - 1) . '">Trang trước</a></li>';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
              echo '<li><a><span>' . $i . '</span></a></li>';
            } else {
              echo '<li><a href="index.php?tab=3&pagen=' . $i . '">' . $i . '</a></li>';
            }
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {
            echo '<li><a href="index.php?tab=3&pagen=' . ($current_page + 1) . '">Trang sau</a></li>';
          }
          ?>

        </ul>
      </div>
    </div>

    <div class=" col-xs-12 col-sm-12 col-lg-3 col-md-3">
      <div class="single-product-widget">
        <div class="list-group">
          <a href="#" class="list-group-item active">Bán chạy nhất</a>
          <div class="list-group-item">
            <?php
            $sql = "select * from product order by soluongbanduoc desc";
            $query = $mysqli->query($sql);
            if (mysqli_num_rows($query) > 0) {
              $count = 0;
              while (($row = mysqli_fetch_array($query)) && $count < 3) {
                $count++;
                echo "<div class='single-wid-product'>";
                echo "<a href='detail.php?item=$row[productID]'><img src='../img/$row[image]' alt='' class='product-thumb'></a>";
                echo "<h2><a href='detail.php?item=$row[productID]'>$row[productName]</a></h2>";
                echo "<div class='product-wid-rating'>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "<i class='fa fa-star'></i>";
                echo "</div>";
                echo "<div class='product-wid-price'>";
                echo "<p>$row[price]" . "đ</p>";
                echo "</div>  ";
                echo "</div>";
                echo "<hr>";
              }
            }
            ?>
          </div>
        </div>
      </div>

      <br>

      <div class="list-group">
        <a href="#" class="list-group-item active">Sản phẩm mới</a>
        <div class="list-group-item">
          <?php
          $conn->set_charset("utf8");
          $sql = "select * from product order by dateupdate desc";
          $query = $mysqli->query($sql);
          if (mysqli_num_rows($query) > 0) {
            $count = 0;
            while (($row = mysqli_fetch_array($query)) && $count < 3) {
              $count++;
              echo "<div class='single-wid-product'>";
              echo "<a href='detail.php?item=$row[productID]'><img width='2em' height='2em' src='../img/$row[image]' alt='' class='product-thumb'></a>";
              echo "<h2><a href='detail.php?item=$row[productID]'>$row[productName]</a></h2>";
              echo "<div class='product-wid-rating'>";
              echo "<i class='fa fa-star'></i>";
              echo "<i class='fa fa-star'></i>";
              echo "<i class='fa fa-star'></i>";
              echo "<i class='fa fa-star'></i>";
              echo "<i class='fa fa-star'></i>";
              echo "</div>";
              echo "<div class='product-wid-price'>";
              echo "<p>$row[price]" . "đ</p>";
              echo "</div>  ";
              echo "</div>";
              echo "<hr>";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- /.row -->
  <hr>
  </div>
  </div>
  <!-- Footer -->
  <?php include '../src/footer.php' ?>


  <!-- /.container -->

  <!-- jQuery -->
  <script src="../js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../js/bxslider.min.js"></script>
  <script type="text/javascript" src="../js/script.slider.js"></script>

</body>

</html>