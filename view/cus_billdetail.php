<!DOCTYPE html>


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đơn hàng chi tiết</title>

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

            <th class="active">Tên sản phẩm</th>
            <th class="active">Giá sản phẩm</th>
            <th class="active">Thời gian bảo hành</th>
            <th class="active">Số lượng</th>

          </tr>


          <?php
          $getid = (int)$_GET['id'];


          $sql = "SELECT * FROM productorders po, product p  
    WHERE po.productID =p.productID AND po.idOther =  $getid";


          $query = mysqli_query($conn, $sql);
          $result = mysqli_num_rows($query);

          if ($result > 0) {
            while ($row = mysqli_fetch_assoc($query)) {

              echo "<tr>";

              echo "<td>" . $row['productName'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
              echo "<td>" . $row['thoigian_baohanh'] . "</td>";
              echo "<td>" . $row['amount'] . "</td>";

              echo "</tr>";
            }
          } else
            echo "false";
          ?>

        </table>
      </div>
    </div>
  </div>
  <?php include '../src/footer.php' ?>

</body>

</html>