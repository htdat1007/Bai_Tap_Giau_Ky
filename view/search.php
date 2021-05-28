<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tìm kiếm</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>

<body>

  <?php include '../libs/connect.php' ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9 col-md-9">
        <form action="" method="POST">
          <select name="choose" style="padding-left:5px;padding-bottom:5px;padding-top:5px;border: 1px solid #d0caca;border-radius:2px">
            <option>Tìm kiếm theo</option>
            <option value="1">Bán chạy nhất</option>
            <option value="2">Giảm giá nhiều nhất</option>
            <option value="3">Giá: Thấp đến cao</option>
            <option value="4">Giá: Cao đến thấp</option>
          </select>
          <input type="submit" name="sub1" value="Lọc">
        </form>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['sub1'])) {
    $select = $_POST['choose'];
    switch ($select) {

      case "1":

        $sql_hot = "select * from product where soluongbanduoc > 0 order by soluongbanduoc desc";

        $query_hot = mysqli_query($conn, $sql_hot);
        if (mysqli_num_rows($query_hot) > 0) {
          echo "<br>"; ?>

          <div class="container">
            <ol class="breadcrumb">
              <li>
                <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                  <?php

                  echo "Kết quả tìm kiếm cho 'điện thoại' (";
                  echo mysqli_num_rows($query_hot) . ")";


                  ?>
                </p>
              </li>
            </ol>
          </div>
          <?php
          ?>

          <div class="container">
            <!-- Title -->

            <div class="row">
              <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                <br>
                <?php
                while ($row = mysqli_fetch_assoc($query_hot)) {

                  $idproduct = (int)$row['productID'];
                  echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
                  echo "<div class='product-item'>";
                  echo "<div class='img-wrapper' style='height:25em'>";
                  echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
                  echo "<div>";
                  $id = (int)$row['productID'];
                  $sql1 = "select * from thongso where productID = $id";
                  $query1 = mysqli_query($conn, $sql1);
                  while ($row1 = mysqli_fetch_array($query1)) {
                    echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>HDD: " . $row1['HDD'] . "</p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>selfe: " . $row1['CMRSau'] . "</p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
                    echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
                  }
                  echo "<br>";
                  echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Detail</a>";
                  echo "</div>";
                  echo "</div>";

                  echo "<h3><a href='detail.php?item=$idproduct'>" . $row['productName'] . "</a></h3>";
                  echo "<div class='price'>" . $row['price'] . "đ</div>";
                  echo "<a href='../action/addcart.php?item=$idproduct' class='btn btn-default add'>MUA NGAY</a>";
                  echo "</div>";
                  echo "</div>";
                }
                echo "</div>";
              } else
                echo "No result";
              break;


            case "2":

              $sql_discount = "select * from product where discount > 0 order by discount desc";
              $query_discount = mysqli_query($conn, $sql_discount);
              if (mysqli_num_rows($query_discount) > 0) {
                echo "<br>"; ?>

                <div class="container">
                  <ol class="breadcrumb">
                    <li>
                      <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                        <?php

                        echo "Kết quả tìm kiếm cho 'điện thoại' (";
                        echo mysqli_num_rows($query_discount) . ")";


                        ?>
                      </p>
                    </li>
                  </ol>
                </div>
                <?php
                ?>

                <div class="container">
                  <!-- Title -->

                  <div class="row">
                    <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                      <br>
                      <?php
                      while ($row = mysqli_fetch_assoc($query_discount)) {

                        $idproduct = (int)$row['productID'];
                        echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
                        echo "<div class='product-item'>";
                        echo "<div class='img-wrapper' style='height:25em'>";
                        echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
                        echo "<div>";
                        $id = (int)$row['productID'];
                        $sql1 = "select * from thongso where productID = $id";
                        $query1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($query1)) {
                          echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>HDD: " . $row1['HDD'] . "</p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>selfe: " . $row1['CMRSau'] . "</p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
                          echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
                        }
                        echo "<br>";
                        echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Detail</a>";
                        echo "</div>";
                        echo "</div>";

                        echo "<h3><a href='detail.php?item=$idproduct'>" . $row['productName'] . "</a></h3>";
                        echo "<div class='price'>" . $row['price'] . "đ</div>";
                        echo "<a href='../action/addcart.php?item=$idproduct' class='btn btn-default add'>MUA NGAY</a>";
                        echo "</div>";
                        echo "</div>";
                      }
                      echo "</div>";
                    } else
                      echo "No result";
                    break;


                    //gia thap den cao
                  case "3":

                    $sql_discount = "select * from product order by price asc";
                    $query_discount = mysqli_query($conn, $sql_discount);
                    if (mysqli_num_rows($query_discount) > 0) {
                      echo "<br>"; ?>

                      <div class="container">
                        <ol class="breadcrumb">
                          <li>
                            <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                              <?php

                              echo "Kết quả tìm kiếm cho 'điện thoại' (";
                              echo mysqli_num_rows($query_discount) . ")";


                              ?>
                            </p>
                          </li>
                        </ol>
                      </div>
                      <?php
                      ?>

                      <div class="container">
                        <!-- Title -->

                        <div class="row">
                          <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                            <br>
                            <?php
                            while ($row = mysqli_fetch_assoc($query_discount)) {

                              $idproduct = (int)$row['productID'];
                              echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
                              echo "<div class='product-item'>";
                              echo "<div class='img-wrapper' style='height:25em'>";
                              echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
                              echo "<div>";
                              $id = (int)$row['productID'];
                              $sql1 = "select * from thongso where productID = $id";
                              $query1 = mysqli_query($conn, $sql1);
                              while ($row1 = mysqli_fetch_array($query1)) {
                                echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>HDD: " . $row1['HDD'] . "</p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>selfe: " . $row1['CMRSau'] . "</p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
                                echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
                              }
                              echo "<br>";
                              echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Detail</a>";
                              echo "</div>";
                              echo "</div>";

                              echo "<h3><a href='detail.php?item=$idproduct'>" . $row['productName'] . "</a></h3>";
                              echo "<div class='price'>" . $row['price'] . "đ</div>";
                              echo "<a href='../action/addcart.php?item=$idproduct' class='btn btn-default add'>MUA NGAY</a>";
                              echo "</div>";
                              echo "</div>";
                            }
                            echo "</div>";
                          } else
                            echo "No result";
                          break;

                          //gia cao den thap
                        case "4":

                          $sql_discount = "select * from product order by price desc";
                          $query_discount = mysqli_query($conn, $sql_discount);
                          if (mysqli_num_rows($query_discount) > 0) {
                            echo "<br>"; ?>

                            <div class="container">
                              <ol class="breadcrumb">
                                <li>
                                  <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                                    <?php

                                    echo "Kết quả tìm kiếm cho 'điện thoại' (";
                                    echo mysqli_num_rows($query_discount) . ")";


                                    ?>
                                  </p>
                                </li>
                              </ol>
                            </div>
                            <?php
                            ?>

                            <div class="container">
                              <!-- Title -->

                              <div class="row">
                                <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                                  <br>
                                <?php
                                while ($row = mysqli_fetch_assoc($query_discount)) {

                                  $idproduct = (int)$row['productID'];
                                  echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
                                  echo "<div class='product-item'>";
                                  echo "<div class='img-wrapper' style='height:25em'>";
                                  echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
                                  echo "<div>";
                                  $id = (int)$row['productID'];
                                  $sql1 = "select * from thongso where productID = $id";
                                  $query1 = mysqli_query($conn, $sql1);
                                  while ($row1 = mysqli_fetch_array($query1)) {
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>HDD: " . $row1['HDD'] . "</p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>selfe: " . $row1['CMRSau'] . "</p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
                                    echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
                                  }
                                  echo "<br>";
                                  echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Detail</a>";
                                  echo "</div>";
                                  echo "</div>";

                                  echo "<h3><a href='detail.php?item=$idproduct'>" . $row['productName'] . "</a></h3>";
                                  echo "<div class='price'>" . $row['price'] . "đ</div>";
                                  echo "<a href='../action/addcart.php?item=$idproduct' class='btn btn-default add'>MUA NGAY</a>";
                                  echo "</div>";
                                  echo "</div>";
                                }
                                echo "</div>";
                              } else
                                echo "No result";
                              break;

                            default:
                                ?>
                                <br>
                                <div class="container">
                                  <ol class="breadcrumb">
                                    <li>
                                      <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                                        <?php

                                        echo "Kết quả tìm kiếm cho 'điện thoại' (";
                                        echo "Không có kết quả nào" . ")";


                                        ?>
                                      </p>
                                    </li>
                                  </ol>
                                </div>

                                <div class="container">
                                  <div class="row">
                                    <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                                    </div>
                              <?php
                              break;
                          }
                        }


                              ?>


                              <?php

                              if (isset($_POST['submit'])) {

                                if (!empty($_POST['tim'])) {
                                  $keyword = $_POST['tim'];
                                  $sql = "select * from product where productName like '%$keyword%'";
                                  $query = mysqli_query($conn, $sql);
                                  $num = mysqli_num_rows($query);

                                  if ($num > 0) {
                              ?>
                                    <br>
                                    <div class="container">
                                      <ol class="breadcrumb">
                                        <li>
                                          <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                                            <?php

                                            echo "Kết quả tìm kiếm cho 'điện thoại' (";
                                            echo $num . ")";


                                            ?>
                                          </p>
                                        </li>
                                      </ol>
                                    </div>


                                    <div class="container">
                                      <!-- Title -->

                                      <div class="row">
                                        <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                                          <br>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($query)) {

                                          $idproduct = (int)$row['productID'];

                                          echo "<div class=' col-lg-4 col-md-4 col-sm-6 hero-feature'>";
                                          echo "<div class='product-item'>";
                                          echo "<div class='img-wrapper' style='height:25em'>";
                                          echo "<img src='../img/$row[image]'class='img-responsive' alt='iphone'>";
                                          echo "<div>";
                                          $id = (int)$row['productID'];
                                          $sql1 = "select * from thongso where productID = $id";
                                          $query1 = mysqli_query($conn, $sql1);
                                          while ($row1 = mysqli_fetch_array($query1)) {
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>Màn Hình: " . $row1['manhinh'] . "</p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>HDD: " . $row1['HDD'] . "</p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>Camera: " . $row1['CMRTruoc'] . ", </p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>selfe: " . $row1['CMRSau'] . "</p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>RAM: " . $row1['RAM'] . "</p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>ROM: " . $row1['ROM'] . "</p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>Thẻ sim: " . $row1['thesim'] . "</p>";
                                            echo "<p style='padding-left:10px;text-align:left; color: white'>Dung lượng Pin: " . $row1['dungluongPIN'] . "</p>";
                                          }
                                          echo "<br>";
                                          echo "<a href='detail.php?item=$row[productID]' class='btn btn-default fancybox-fast-view'>Detail</a>";
                                          echo "</div>";
                                          echo "</div>";

                                          echo "<h3><a href='detail.php?item=$idproduct'>" . $row['productName'] . "</a></h3>";
                                          echo "<div class='price'>" . $row['price'] . "đ</div>";
                                          echo "<a href='../action/addcart.php?item=$idproduct' class='btn btn-default add'>MUA NGAY</a>";
                                          echo "</div>";
                                          echo "</div>";
                                        }

                                        echo "</div>";
                                      } else
                                        echo "No result";
                                    } else {
                                        ?>
                                        <br>
                                        <div class="container">
                                          <ol class="breadcrumb">
                                            <li>
                                              <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                                                <?php

                                                echo "Kết quả tìm kiếm cho 'điện thoại' (";
                                                echo "Không có kết quả nào" . ")";


                                                ?>
                                              </p>
                                            </li>
                                          </ol>
                                        </div>

                                        <div class="container">
                                          <div class="row">
                                            <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9">
                                            </div>
                                        <?php
                                      }
                                    }
                                        ?>





                                        <?php
                                        include '../libs/connect.php';
                                        $mysqli = new mysqli("localhost", "root", "", "webdata5");
                                        ?>

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
                                              $sql = "select * from product order by productID desc";
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

                                        </div>
                                        <!-- Footer -->
                                        <?php include '../src/footer.php' ?>


</body>

</html>