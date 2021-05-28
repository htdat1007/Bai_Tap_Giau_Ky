<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang khuyến mãi</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


</head>

<body>



  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="#">Khuyến mãi</a></li>
    </ol>
  </div>

  <div class="container">
    <!-- Title -->
    <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
      <?php
      include '../libs/connect.php';
      $mysqli = new mysqli("localhost", "root", "", "webdata5");
      $conn->set_charset("utf8");
      //lấy sản phẩm trong database
      $getdata = "select count(productID) as total from product where discount > 0";
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
      $sql1 = "select * from product where discount > 0 order by discount desc LIMIT $start, $limit";
      $query1 = $mysqli->query($sql1);

      //var_dump($query);
      if ($query1) {
        if (mysqli_num_rows($query1) > 0) {
          while ($row = mysqli_fetch_array($query1)) {

            echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
            echo "<div class='product-item'>";
            echo "<div class='img-wrapper' style='height:25em'>";
            echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
            echo "<div>";
            echo "<br>";
            $id = (int)$row['productID'];
            $sqlts = "select * from thongso where productID = $id";
            $queryts = mysqli_query($conn, $sqlts);
            while ($rowts = mysqli_fetch_array($queryts)) {
              echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $rowts['manhinh'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>HDD: " . $rowts['HDD'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $rowts['CMRTruoc'] . ", </p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>selfe: " . $rowts['CMRSau'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $rowts['RAM'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $rowts['ROM'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $rowts['thesim'] . "</p>";
              echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $rowts['dungluongPIN'] . "</p>";
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
      }
      ?>
      <!--/show san pham len san pham HOT-->


      <div class="col-md-12 col-sm-12 col-xs-12 hero-feature">
        <ul class="pager">


          <?php
          //HIỂN THỊ PHÂN TRANG
          // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
          if ($current_page > 1 && $total_page > 1) {
            echo '<li><a href="discount.php?page=' . ($current_page - 1) . '">Trang trước</a></li>';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
              echo '<li><a><span>' . $i . '</span></a></li>';
            } else {
              echo '<li><a href="discount.php?page=' . $i . '">' . $i . '</a></li>';
            }
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {
            echo '<li><a href="discount.php?page=' . ($current_page + 1) . '">Trang sau</a></li>';
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

  <hr>
  </div>
  </div>
  <!-- Footer -->
  <?php include '../src/footer.php' ?>

</body>

</html>