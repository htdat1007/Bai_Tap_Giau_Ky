<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chi tiết</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link href="../css/register.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">



  <style type="text/css">
    .pic {
      margin-left: 100px;
      margin-bottom: 40px;
      margin-right: 130px;
    }
  </style>
</head>

<body>

  <?php
  include '../libs/connect.php';
  $conn->set_charset("utf8");
  $stt = (int)$_GET['item'];
  $queryname = mysqli_query($conn, "select * from product where productID = $stt");
  $rowname = mysqli_fetch_array($queryname);
  ?>

  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="category.php">Phone</a></li>
      <li><a href="#"><?php echo $rowname['productName'] ?></a></li>
    </ol>
  </div>
  <div class="container">
    <!-- Title -->
    <div class="row">

      <div class="col-md-5">
        <?php
        include '../libs/connect.php';
        $mysqli = new mysqli("localhost", "root", "", "webdata5");
        $mysqli->set_charset("utf8");
        $id = $_GET['item'];
        $sql = "select * from product  where productID=($id)";
        $query = $mysqli->query($sql);
        if (mysqli_num_rows($query) > 0) {
          $row = mysqli_fetch_array($query);
          $count = 1;
          $pic = "pic" . $count;

          echo "<div class='tab-content' >";
          echo   "<div id='$pic' class='tab-pane fade in active' style='background-color:white;'>";
          echo     "<img class='img-responsive pic' src='../img/$row[image]' alt='' style='width:300px ;height=500px;'>";
          echo   "</div>";
          $sql = "select * from product p,image i where p.productID=i.productID and p.productID=($id)";
          $query = $mysqli->query($sql);
          while ($rowImage = mysqli_fetch_array($query)) {
            $count++;
            $pic = "pic" . $count;

            echo   "<div id='$pic' class='tab-pane fade' style='background-color:white;'>";
            echo     "<img class='img-responsive pic' src='../img/$rowImage[url]' alt='' style='width:300px ;height=500px;'>";
            echo   "</div>";
          }
          echo "</div>";


          echo "Xem thêm:";
          echo  "<br><br>";
          $count = 1;
          $link = "#pic" . $count;
          echo "<ul class='nav nav-tabs' >";
          echo   "<li class='active'>";
          echo     "<a data-toggle='tab' href='$link'><img class='img-responsive' src='../img/$row[image]' alt='' style='width:100px; height:100px;'></a>";
          echo   "</li>";
          $sql = "select * from product p,image i where p.productID=i.productID and p.productID=($id)";
          $query = $mysqli->query($sql);
          while ($rowImage = mysqli_fetch_array($query)) {
            $count++;
            $link = "#pic" . $count;
            echo   "<li>";
            echo     "<a data-toggle='tab' href='$link'><img class='img-responsive' src='../img/$rowImage[url]' alt='' style='width:100px; height:100px;'></a>";
            echo   "</li>";
          }
          echo "</ul>";
        }
        ?>

      </div>


      <div class="col-md-5">
        <?php
        echo "<h3 style='display:inline;font-weight:bold'>$row[productName]</h3>";

        echo "<h3 style='display:block;font-size:20px;color:red'>Giá bán tại siêu thị: $row[price]đ</h3>";
        ?>
        <h3 style="color:green;font-weight: 600;">Quà Khuyến mãi</h3>
        <ul style="list-style-image:url(../img/tick-icon.png)">
          <li>Cơ hội trúng 3 xe Liberty khi mua iPhone tại khu vực Hà Nội </li>
          <li>Giảm ngay 5% khi Mua Laptop/ Tablet</li>
          <li>Mua sim Vina Bùm 50 giá chỉ từ 75.000đ: Miễn phí 10 phút đầu cho tất cả cuộc gọi nội mạng</li>
        </ul>
        <p style="color: blue;font-weight:bold;font-size: 18px"> Choose color of Product:</p>
        <div class="choose_color">
          <a style="font-weight: bold" class="btn btn-success" href="#">Green</a>
          <a style="font-weight: bold" class="btn btn-danger" href="#">Red</a>
          <a style="font-weight: bold" class="btn btn-default" href="#">White</a>
          <a style="font-weight: bold;background-color: black;color: white" class="btn btn-default" href="#">Black</a>
          <a style="font-weight: bold;background-color: yellow" class="btn btn-default" href="#">Yellow</a>

        </div>
        <br>
        <?php
        echo "<a style='font-weight:bold' class='btn btn-primary' href='../action/addcart.php?item=$row[productID]'>ĐẶT HÀNG</a>";

        echo " <a style='font-weight:bold' class='btn btn-warning' href='../action/buynow.php?item=$row[productID]'>MUA NHANH</a>"
        ?>

      </div>
    </div>
    <br><br>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Thông Số Kỹ Thuật</a></li>
          <li><a data-toggle="tab" href="#menu2">Đánh giá chi tiết</a></li>
        </ul>
        <div class="tab-content " style="background-color:white;">
          <div id="home" class="tab-pane fade in active" style="background-color:white;">
            <div class="row">
              <div class="col-md-5">
                <table class="table table-condensed">

              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <table class="table table-condensed">
                  <?php
                  $sql = "select * from product p,thongso t where p.productID=t.productID and p.productID=($id)";
                  $query = $mysqli->query($sql);
                  if (mysqli_num_rows($query) > 0) {
                    $rowTect = mysqli_fetch_array($query);
                    echo "<tbody>";
                    echo  "<tr>";
                    echo    "<td>Màn hình:</td>";
                    echo    "<td>$rowTect[manhinh]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>Hệ điều hành:</td>";
                    echo    "<td>$rowTect[HDD]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>Camera sau:</td>";
                    echo    "<td>$rowTect[CMRTruoc]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>Camera trước:</td>";
                    echo    "<td>$rowTect[CMRSau]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>RAM:</td>";
                    echo    "<td>$rowTect[RAM]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>ROM:</td>";
                    echo    "<td>$rowTect[ROM]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>thẻ sim:</td>";
                    echo    "<td>$rowTect[thesim]</td>";
                    echo  "</tr>";
                    echo  "<tr>";
                    echo    "<td>Dung lượng pin:</td>";
                    echo    "<td>$rowTect[dungluongPIN]</td>";
                    echo  "</tr>";
                    echo "</tbody>";
                  }
                  ?>


                </table>
              </div>
            </div>

          </div>
          <div id="menu2" class="tab-pane fade" style="background-color:white;">
            <div class="row">
              <?php
              $conn->set_charset("utf8");
              $querydes = mysqli_query($conn, "select * from product where productID = $stt");
              $rowdes = mysqli_fetch_array($querydes);
              echo "<br>";
              echo "<p>" . $rowdes['description'] . "<p>";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <div class="row">
      <p style="color: blue;font-weight: bold;size: 3em">Bình luận về bài viết:</p>
      <form action="" method="post">
        <div class="status-upload" class="row">
          <div class="col-xs-0.25 col-sm-0.25 col-lg-0.25" style="float: left;">
            <img style="height: 2em;margin-right: 0.5em" src="https://static18.muarecdn.com/styles/muare/xenforo/avatars/avatar_female_l.png">
          </div>
          <div class="col-xs-11.7 col-sm-11.7 col-lg-11.7">
            <textarea style="width: 96%;height:4em;margin-top: 1em;" placeholder="What are you doing right now?" name="text"></textarea>
            <input style="float: right;margin-right:20px;margin-top: 0.5em; background: green" name="submit" type="submit" class="btn btn-success">
          </div>
        </div>
      </form>
      <?php
      $conn->set_charset("utf8");
      $idproduct1 = (int)$_GET['item'];
      $userid = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

      if (isset($_POST['submit'])) {
        if ($userid != 0) {
          if (empty($_POST['text'])) {
            echo "<script>alert('vui lòng nhập nội dung.')</script>";
          } else {
            $text = mysqli_real_escape_string($conn, $_POST['text']);

            $sqlc = "insert into comment(commentID, content, userID, productID) values('', '$text', $userid, $idproduct1)";
            $queryc = mysqli_query($conn, $sqlc);
            // if($query){
            //   echo "success";
            // }
            // else
            //   echo "false";
          }
        } else
          echo "<script>alert('Vui lòng đăng nhập trước khi bình luận')</script>";
      }

      ?>

      <?php
      $conn->set_charset("utf8");
      $idproduct = (int)$_GET['item'];
      $sqluser = "SELECT * FROM `comment` WHERE  productID =  $idproduct";
      $query6 = mysqli_query($conn, $sqluser);

      // $sqlcount = "SELECT COUNT * AS total FROM comment WHERE productID = $idproduct ORDER BY commentID DESC, commentID ASC LIMIT 10";
      // $query2 = mysqli_query($conn, $sqlcount);
      // $data = mysqli_fetch_assoc($query2);


      // var_dump($data);

      ?>



      <?php

      $count = mysqli_num_rows($query6);
      echo "<p style='margin-top: 3em; font-weight: bold;'>" . $count . " Bình luận:</p>";

      if (mysqli_num_rows($query6) > 0) {
        while ($row = mysqli_fetch_assoc($query6)) {
          $dk = $row['userID'];
          $sqlname = "SELECT * FROM `user` WHERE id = $dk";
          $queryname = mysqli_query($conn, $sqlname);

          if (mysqli_num_rows($queryname) > 0) {
            while ($row1 = mysqli_fetch_assoc($queryname)) {


      ?>


              <div class="status-upload" class="row">
                <div class="col-xs-0.25 col-sm-0.25 col-lg-0.25" style="float: left;">
                  <img style="height: 2em;margin-right: 0.5em" src="https://static18.muarecdn.com/styles/muare/xenforo/avatars/avatar_female_l.png">
                </div>
                <div class="col-xs-11.7 col-sm-11.7 col-lg-11.7">
                  <span style="font-weight: bold"><?php echo $row1['username'] ?></span>
                  <p><?php echo $row['content']; ?></p>
                </div>
              </div>
      <?php
            }
          }
        }
      }
      ?>

    </div>
  </div>
  </div>
  <!-- Footer -->
  <?php include '../src/footer.php' ?>

  <script src="../js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>