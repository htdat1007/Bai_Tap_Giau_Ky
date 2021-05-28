<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chỉnh sửa sản phẩm</title>

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
      <li><a href="adcategory.php">Loại sản Phẩm</a></li>

    </ol>
  </div>
  <div class="container">
    <div class="col-md-3">
      <div class="categories">

        <ul>
          <h3>QUẢN LÝ</h3>
          <li><a href="../view/adcategory.php">Sản phẩm</a></li>
          <li><a href="../view/adcustomer.php">Khách hàng</a></li>
          <li><a href="../view/bill.php">Đơn hàng</a></li>
          <li><a href="../view/contact.php">Phản hồi</a></li>

        </ul>
      </div>
    </div>
    <?php
    $conn->set_charset("utf8");
    $a = (int)$_GET['productid'];
    $sql1 = "SELECT * FROM `product` WHERE productID = $a";
    $query1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($query1) > 0) {
      while ($row = mysqli_fetch_assoc($query1)) {

        //   }
        // }
    ?>
        <div class="col-md-9">
          <h3 style="text-align:center; color:blue; font-size: 2em; font-weight:bold;line-height: 50px">CHỈNH SỬA SẢN PHẨM</h3>
          <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="idp" class="col-lg-3 control-label">ID <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="number" class="form-control" id="idp" name="idp" value="<?php echo $row['productID'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="pname" class="col-lg-3 control-label">Tên sản phẩm <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $row['productName'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="col-lg-3 control-label">Giá sản phẩm <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="discount" class="col-lg-3 control-label">Khuyến mãi <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="number" class="form-control" id="discount" name="discount" value="<?php echo $row['discount'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="image" class="col-lg-3 control-label">Hình đại diện <span class="require">*</span></label>
              <div class="col-lg-8">
                <input id="image" type="file" accept="image/" name="image" value="<?php echo $row['image'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="image1" class="col-lg-3 control-label">Hình 1 <span class="require">*</span></label>
              <div class="col-lg-8">
                <input id="image1" type="file" accept="image/" name="image1">
              </div>
            </div>
            <div class="form-group">
              <label for="image2" class="col-lg-3 control-label">Hình 2 <span class="require">*</span></label>
              <div class="col-lg-8">
                <input id="image2" type="file" accept="image/" name="image2">
              </div>
            </div>
            <!-- <div class="form-group">
        <label for="image3" class="col-lg-3 control-label">Hình 3 <span class="require">*</span></label>
        <div class="col-lg-8">
          <input id="image3" type="file" accept="image/" name="image3">
        </div>
      </div> -->
            <div class="form-group">
              <label for="category" class="col-lg-3 control-label">Loại sản phẩm <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $row['categoryID']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="soluong" class="col-lg-3 control-label">Số lượng <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $row['soluonghientai']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="mota" class="col-lg-3 control-label">Mô tả <span class="require">*</span></label>
              <div class="col-lg-8">
                <textarea type="text" class="form-control" id="mota" name="mota"><?php echo $row['description']; ?></textarea>
              </div>
            </div>
            <?php
            $b = (int)$row['productID'];
            $sql2 = "SELECT * FROM `thongso` WHERE productID = $b";
            $query2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($query2) > 0) {
              while ($row2 = mysqli_fetch_assoc($query2)) {
            ?>
                <div class="form-group">
                  <label for="thongso" class="col-lg-3 control-label">Màn hình <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="thongso" name="thongso" value="<?php echo $row2['manhinh'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="hdd" class="col-lg-3 control-label">Hệ điều hành <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="hdd" name="hdd" value="<?php echo $row2['HDD'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cmrt" class="col-lg-3 control-label">Camera trước <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="cmrt" name="cmrt" value="<?php echo $row2['CMRTruoc'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cmrs" class="col-lg-3 control-label">Camera sau <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="cmrs" name="cmrs" value="<?php echo $row2['CMRSau'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ram" class="col-lg-3 control-label">RAM <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="ram" name="ram" value="<?php echo $row2['RAM'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="rom" class="col-lg-3 control-label">ROM <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="rom" name="rom" value="<?php echo $row2['ROM'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="thesim" class="col-lg-3 control-label">Thẻ sim <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="thesim" name="thesim" value="<?php echo $row2['thesim'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="dungluong" class="col-lg-3 control-label">Dung lượng pin <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="dungluong" name="dungluong" value="<?php echo $row2['dungluongPIN'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="date" class="col-lg-3 control-label">Ngày cập nhật <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="date" name="date" value="<?php echo $row['dateupdate'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bh" class="col-lg-3 control-label">Thời gian bảo hành <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="bh" name="bh" value="<?php echo $row['thoigian_baohanh'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                    <input class="btn btn-success" type="submit" name="submit" value="TẠO">
                    <a href="admin.php?categoryid=<?php echo $row['categoryID'] ?>" class="btn btn-warning" type="reset" name="reset">HỦY</a>
                  </div>
                </div>
          </form>
        </div>
  </div>
<?php
              }
            }
          }
        }
?>
<?php
if (isset($_POST['submit'])) {
  $id = mysqli_real_escape_string($conn, $_POST['idp']);
  $pname = mysqli_real_escape_string($conn, $_POST['pname']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $discount = mysqli_real_escape_string($conn, $_POST['discount']);

  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $soluong = mysqli_real_escape_string($conn, $_POST['soluong']);
  $mota = mysqli_real_escape_string($conn, $_POST['mota']);
  $thongso = mysqli_real_escape_string($conn, $_POST['thongso']);
  $hdd = mysqli_real_escape_string($conn, $_POST['hdd']);
  $cmrt = mysqli_real_escape_string($conn, $_POST['cmrt']);
  $cmrs = mysqli_real_escape_string($conn, $_POST['cmrs']);
  $rom = mysqli_real_escape_string($conn, $_POST['rom']);
  $ram = mysqli_real_escape_string($conn, $_POST['ram']);
  $thesim = mysqli_real_escape_string($conn, $_POST['thesim']);
  $dungluong = mysqli_real_escape_string($conn, $_POST['dungluong']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $bh = mysqli_real_escape_string($conn, $_POST['bh']);

  $check1 = $check2 = $check3 = $check4 = $check5 = $check6 = false;

  $name = $_FILES['image']['name'];
  $name1 = $_FILES['image1']['name'];
  $name2 = $_FILES['image2']['name'];

  if (!is_numeric($id)) {
    echo "<script> alert('id phải là số') </script>";
  } else if (empty($id)) {
    echo "<script> alert('id không được bỏ trống') </script>";
  } else {
    $check1 = true;
  }

  if (!is_numeric($price)) {
    echo "<script> alert('giá phải là số') </script>";
  } else if (empty($price)) {
    echo "<script> alert('giá tiền không được bỏ trống') </script>";
  } else {
    $check2 = true;
  }

  if (empty($discount)) {
    $discount = 0;
    $check3 = true;
  } else {
    $check3 = true;
  }

  if (!is_numeric($soluong)) {
    echo "<script> alert('số lượng sản phẩm phải là số') </script>";
  } else if (empty($soluong)) {
    echo "<script> alert('số lượng sản phẩm phải là số') </script>";
  } else {
    $check4 = true;
  }

  if (!is_numeric($category)) {
    echo "<script> alert('thứ tự loại sản phẩm phải là số') </script>";
  } else if (empty($category)) {
    echo "<script> alert('loại sản phẩm phải là số') </script>";
  } else {
    $check5 = true;
  }


  $id = (int)$_GET['productid'];
  if ($check1 && $check2 && $check3 && $check4 && !empty($pname) && !empty($mota) && !empty($thongso) && !empty($hdd) && !empty($cmrt) && !empty($cmrs) && !empty($rom) && !empty($thesim) && !empty($dungluong) && !empty($date) && !empty($bh)) {
    $sql = "update thongso set manhinh='$thongso', HDD='$hdd', CMRTruoc='$cmrt', CMRSau='$cmrs', RAM='$ram', ROM='$rom', thesim='$thesim', dungluongPIN='$dungluong' where productID = $id";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      echo "";
    }


    if ((!empty($name)) && (!empty($name1)) && (!empty($name2))) {
      $sql1 = "update image set url='{$name1}' where productID = $id";
      $query1 = mysqli_query($conn, $sql1);
      if ($query1) {
        $checkq1 = true;
      } else
        $checkq1 = false;

      $sql2 = "update image set url='{$name2}' where productID = $id";
      $query2 = mysqli_query($conn, $sql2);
      if ($query2) {
        $checkq2 = true;
      } else
        $checkq2 = false;
    }

    if (!empty($name)) {
      $sql3 = "UPDATE product SET productName='$pname', description='$mota', price=$price, discount=$discount, image='{$name}', categoryID=$category, dateupdate = '$date', thoigian_baohanh='$bh' WHERE productID = $id";
      $query3 = mysqli_query($conn, $sql3);
      if ($query3) {
        echo "";
      } else
        echo "<script> alert('" . mysqli_error($conn) . "') </script>";
    } else {
      $sql4 = "UPDATE product SET productName='$pname', description='$mota', price=$price, discount=$discount, categoryID=$category, dateupdate = '$date', thoigian_baohanh='$bh' WHERE productID = $id";
      $query4 = mysqli_query($conn, $sql4);
      if ($query4) {
        echo "<script> alert('edit successful') </script>";
      } else
        echo mysqli_error($conn);
    }
  } else
    echo "<script> alert('" . mysqli_error($conn) . "') </script>";
}


?>
<?php include '../src/footer.php' ?>


</body>

</html>