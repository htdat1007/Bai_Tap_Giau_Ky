<!DOCTYPE html>


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đơn hàng</title>

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

  <?php include '../libs/connect.php' ?>
  <!-- Page Content -->
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="#">Đơn hàng</a></li>
    </ol>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5 style="line-height:50px;margin-top:-15px;font-weight:bold">Danh sách đơn hàng của tôi.</h5>
        <table class="table table-bordered">
          <tr>
            <th class="active" style="text-align:center">Mã đơn hàng</th>
            <th class="active" style="text-align:center">Ngày mua</th>

            <th class="active" style="text-align:center">Tổng tiền</th>
            <th class="active" style="text-align:center">Trạng thái</th>
            <th class="active" style="text-align:center">Chi tiết đơn hàng</th>
          </tr>

          <?php
          $conn->set_charset("utf8");
          $user_id = $_SESSION['user_id'];

          $sql = "select * from orders where is_customer = $user_id";
          $query = mysqli_query($conn, $sql);
          if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {

          ?>
              <tr>
                <td><?php echo $row['idOther'] ?></td>
                <td><?php echo $row['date_buy'] ?></td>

                <td><?php echo $row['total'] ?></td>
                <td><?php echo $row['is_pay'] ?></td>
                <?php echo "<td>" . "<a href = 'cus_billdetail.php?id=$row[idOther]'><span class='glyphicon glyphicon-tag'></span></a>" . "</td>"; ?>
              </tr>
            <?php
            }
          } else { ?>


            <ol class="breadcrumb">
              <li>
                <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                  <?php

                  echo "Bạn chưa mua sản phẩm nào. <a href='index.php'>Mời bạn quay về trang chủ để mua hàng</a>";


                  ?>
                </p>
              </li>
            </ol>

          <?php
          }
          ?>



        </table>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../src/footer.php' ?>

</body>

</html>