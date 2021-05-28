<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

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
      <li><a href="adcategory.php">Loại sản phẩm</a></li>

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

        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <h3 style="text-align:center;font-weight:bold;color:orange">CHI TIẾT SẢN PHẨM</h3>
      <a href="insert.php?categoryid=<?php echo isset($_GET['categoryid']) ? (int)$_GET['categoryid'] : '1' ?>"" style=" float:right;background::#94CB32;" class="btn btn-success">Thêm sản phẩm mới</a>
      <br>
      <br>
      <table class="table table-bordered">
        <tr>
          <th class="active" style="text-align:center">ID</th>
          <th class="active" style="text-align:center">Tên Sản Phẩm</th>
          <th class="active" style="text-align:center">Loại Sản phẩm</th>
          <th class="active" style="text-align:center">Giá</th>
          <th class="active" style="text-align:center">Khuyến mãi</th>
          <th class="active" style="text-align:center">Thời gian bảo hành</th>
          <th class="active" style="text-align:center">Số lượng</th>
          <th class="active" style="text-align:center">Ngày cập nhật</th>
          <th class="active" style="text-align:center">action</th>
        </tr>


        <?php
        //coi kiểu dữ liệu
        //echo gettype($_GET['categoryid']);
        // var_dump($_GET['id']);

        //ép kiểu
        $a = isset($_GET['categoryid']) ? (int)$_GET['categoryid'] : 1;

        // echo $a;
        $sql = "SELECT * FROM product AS p, category AS c 
    WHERE (p.categoryID = $a  AND p.categoryID = c.categoryID)";


        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['productID'];
            echo "<tr>";
            echo "<td>" . $row['productID'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
            echo "<td>" . $row['categoryName'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['discount'] . "</td>";
            echo "<td>" . $row['thoigian_baohanh'] . "</td>";
            echo "<td>" . $row['soluonghientai'] . "</td>";
            echo "<td>" . $row['dateupdate'] . "</td>";
            echo '<td><a href="edit.php?productid=' . $id . '">';
            echo "<span class='glyphicon glyphicon-pencil'></span></a>";
            echo ' <a href="delete.php?productid='  . $id . '" onclick="myFunction();">';
            // echo ' <a onclick="myFunction();">';
            echo "<span class='glyphicon glyphicon-trash'></span></a></td>";
            echo "</tr>";
        ?>

            </script>
          <?php
          }
        } else { ?>

          <br>
          <ol class="breadcrumb">
            <li>
              <p style="color:#181e25; font-size: 15px;font-weight:bold;padding-top: 10px;">
                <?php

                echo "Bạn chưa có sản phẩm nào trong cơ sở dữ liệu";


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
  <?php include '../src/footer.php' ?>

</body>

</html>