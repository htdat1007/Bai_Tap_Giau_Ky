<!DOCTYPE html>
<html lang="en">

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
      <li><a href="#">Đơn hàng</a></li>

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
          <li><a href="contact.php">Phản hồi</a></li>
          <li><a href="comment.php">Bình luận sản phẩm</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <h3 style="text-align:center;font-weight:bold;color:orange">QUẢN LÝ SẢN PHẨM</h3>
      <br>
      <br>
      <table class="table table-bordered">
        <tr>
          <th class="active" style="text-align:center">ID</th>
          <th class="active" style="text-align:center">Tên Người Mua</th>
          <th class="active" style="text-align:center">Email</th>
          <th class="active" style="text-align:center">Địa Chỉ</th>
          <th class="active" style="text-align:center">Điện thoại</th>
          <th class="active" style="text-align:center">Ngày Mua</th>
          <th class="active" style="text-align:center">Tổng Tiền</th>
          <th class="active" style="text-align:center">Chi tiết</th>
          <th class="active" style="text-align:center">Xóa</th>
        </tr>


        <?php
        $sql = "SELECT * FROM orders";
        $conn->set_charset("utf8");
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
          while ($row = mysqli_fetch_assoc($query)) {

            echo "<tr>";
            echo "<td>" . $row['idOther'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['date_buy'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "<td>" . "<a href = 'detailorder.php?id=$row[idOther]'><span class='glyphicon glyphicon-tag'></span></a>" . "</td>";
            echo "<td><button name='delete"  . $row['idOther'] . "' onclick='myFunction(" . $row['idOther'] . ");' style='border:none;background-color:#ffffff'><span class='glyphicon glyphicon-trash'></span></button></td>";
            echo "</tr>";
          }
        } else
          echo "false";

        // echo $a;
        //   $sql = "SELECT * FROM productorders po, product p , orders o 
        //   WHERE po.productID =p.productID AND po.idOther = o.idOther";


        //   $query = mysqli_query($conn, $sql);
        //   $result = mysqli_num_rows($query);

        //   if ($result > 0){
        //     while($row = mysqli_fetch_assoc($query)){

        //       echo "<tr>";
        //       echo "<td>" . $row['idOther'] . "</td>";
        //       echo "<td>". $row['fullname']. "</td>";
        //       echo "<td>". $row['email']. "</td>";
        //       echo "<td>" . $row['address'] . "</td>";
        //       echo "<td>" . $row['productName'] . "</td>";
        //       echo "<td>" . $row['amount'] . "</td>";
        //       echo "<td>" . ($row['price'] - $row['discount'] )*$row['amount']  . "</td>";
        //       echo "<td>" . $row['date_buy'] . "</td>";
        //       echo "<td>" . $row['total'] . "</td>";

        //       echo "</tr>";
        //     }
        //   }
        // else
        //   echo "false";
        ?>

      </table>
    </div>
  </div>
  <script type="text/javascript">
    function myFunction(id) {
      if (confirm("Bạn chắc chắn muốn xóa thành viên này?") == true) {
        window.location = "../action/del_bill.php?orderid=" + id
      }
    }
  </script>
  <?php include '../src/footer.php' ?>




</body>

</html>