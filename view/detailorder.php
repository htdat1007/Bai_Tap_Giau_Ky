<!DOCTYPE html>
<html lang="en">

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


  <?php include '../libs/connect.php' ?>
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="bill.php">Đơn Hàng</a></li>
      <li><a href="#">Chi tiết</a></li>
    </ol>
  </div>
  <div class="container">
    <div class="col-md-3">
      <div class="categories">

        <ul>
          <h3>QUẢN LÝ</h3>
          <li><a href="adcategory.php">Sản phẩm</a></li>
          <li><a href="adcustomer.php">Khách hàng</a></li>
          <li><a href="bill.php">Đơn hàng</a></li>

        </ul>
      </div>
    </div>
    <div class="col-md-9">

      <br>
      <br>
      <table class="table table-bordered">
        <tr>
          <th class="active">ID product</th>
          <th class="active">Tên sản phẩm</th>
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
            echo "<td>" . $row['productID'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
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
  <?php include '../src/footer.php' ?>

</body>

</html>