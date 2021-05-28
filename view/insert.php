<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Thêm dữ liệu sản phẩm vào cơ sở dữ liệu</title>

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
  <?php
  global $err;
  ?>
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
    <div class="col-md-9">
      <h3 style="text-align:center; color:blue; font-size: 2em; font-weight:bold;line-height: 50px">THÊM SẢN PHẨM</h3>
      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

        <div class="form-group">
          <label for="pname" class="col-lg-3 control-label">Tên sản phẩm <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="pname" name="pname" placeholder="Sony Xperia Z5 Dual">
          </div>
        </div>
        <div class="form-group">
          <label for="price" class="col-lg-3 control-label">Giá sản phẩm <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="number" class="form-control" id="price" name="price" placeholder="7500000">
          </div>
        </div>
        <div class="form-group">
          <label for="discount" class="col-lg-3 control-label">Khuyến mãi <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="number" class="form-control" id="discount" name="discount" placeholder="200000">
          </div>
        </div>
        <div class="form-group">
          <label for="image" class="col-lg-3 control-label">Hình đại diện <span class="require">*</span></label>
          <div class="col-lg-8">
            <input id="image" type="file" accept="image/" name="image">
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
        <div class="form-group">
          <label for="soluong" class="col-lg-3 control-label">Số lượng <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="number" class="form-control" id="soluong" name="soluong" placeholder="30">
          </div>
        </div>
        <div class="form-group">
          <label for="mota" class="col-lg-3 control-label">Mô tả <span class="require">*</span></label>
          <div class="col-lg-8">
            <textarea type="text" class="form-control" id="mota" name="mota" placeholder="mô tả"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="thongso" class="col-lg-3 control-label">Màn hình <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="thongso" name="thongso" placeholder="IPS LCD, 5.5'', Full HD">
          </div>
        </div>
        <div class="form-group">
          <label for="hdd" class="col-lg-3 control-label">Hệ điều hành <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="hdd" name="hdd" placeholder="Android 6.0 (Marshmallow)">
          </div>
        </div>
        <div class="form-group">
          <label for="cmrt" class="col-lg-3 control-label">Camera trước <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="cmrt" name="cmrt" placeholder="5.1 MP">
          </div>
        </div>
        <div class="form-group">
          <label for="cmrs" class="col-lg-3 control-label">Camera sau <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="cmrs" name="cmrs" placeholder="23 MP">
          </div>
        </div>
        <div class="form-group">
          <label for="ram" class="col-lg-3 control-label">RAM <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="ram" name="ram" placeholder="3 GB">
          </div>
        </div>
        <div class="form-group">
          <label for="rom" class="col-lg-3 control-label">ROM <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="rom" name="rom" placeholder="32 GB">
          </div>
        </div>
        <div class="form-group">
          <label for="thesim" class="col-lg-3 control-label">Thẻ sim <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="thesim" name="thesim" placeholder="1 SIM, Nano SIM">
          </div>
        </div>
        <div class="form-group">
          <label for="dungluong" class="col-lg-3 control-label">Dung lượng pin <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="dungluong" name="dungluong" placeholder="1960 mAh">
          </div>
        </div>

        <div class="form-group">
          <label for="date" class="col-lg-3 control-label">Ngày cập nhật <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="date" class="form-control" id="date" name="date">
          </div>
        </div>
        <div class="form-group">
          <label for="bh" class="col-lg-3 control-label">Thời gian bảo hành <span class="require">*</span></label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="bh" name="bh" placeholder="Nhập số tháng bảo hành. Ex: 6">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
            <input class="btn btn-success" type="submit" name="submit" value="TẠO">
            <a href="admin.php?categoryid=<?php echo $_GET['categoryid'] ?>" class="btn btn-warning">HỦY</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $discount = mysqli_real_escape_string($conn, $_POST['discount']);
    $category = (int)$_GET['categoryid'];
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

    $name = $_FILES['image']['name'];
    $name1 = $_FILES['image1']['name'];
    $name2 = $_FILES['image2']['name'];

    $check1 = $check2 = false;
    if (empty($name) || empty($price) || empty($discount) || empty($discount) || empty($soluong) || empty($mota) || empty($thongso) || empty($hdd) || empty($cmrt) || empty($cmrs) || empty($rom) || empty($ram) || empty($dungluong) || empty($date) || empty($bh)) {
      echo "<script>alert('Các ô thông tin sản phẩm không được để trống.')</script>";
    } else
      $check1 = true;
    if (empty($name) || empty($name1) || empty($name2)) {
      echo "<script>alert('Vui lòng chọn tệp hình ảnh.')</script>";
    } else
      $check2 = true;
    if ($check1 && $check2) {
      $sql = "INSERT INTO `product` (`productID`, `productName`, `description`, `price`, `discount`, `image`, `categoryID`, `dateupdate`, `soluonghientai`, `soluongconlai`,`thoigian_baohanh`) VALUES 
    (NULL, '$pname', '$mota', $price, $discount, '{$name}', $category, '$date', $soluong, 20, $bh)";
      $query = mysqli_query($conn, $sql);
      $id = 0;
      if ($query) {
        $id = $conn->insert_id;
      } else
        echo "<script>alert('Thêm sản phẩm bị lỗi')</script>";
      //chèn 3 hình nhỏ
      $sql2 = "INSERT INTO `image` (`imageID`, `imageName`, `url`, `productID`, `choose`)VALUES ('', '$pname', '{$name1}', $id, 1);";
      $query2 = mysqli_query($conn, $sql2);

      $sql3 = "INSERT INTO `image` (`imageID`, `imageName`, `url`, `productID`, `choose`)
    VALUES ('', '$pname', '{$name2}', $id, 1)";
      $query3 = mysqli_query($conn, $sql3);

      //insert thong so 
      $sql5 = "INSERT INTO `ThongSo` (`thongsoID`, `productID`, `manhinh`, `HDD`, `CMRTruoc`, `CMRSau`, `RAM`, `ROM`, `thesim`, `dungluongPIN`)
    VALUES ('', $id, '$thongso', '$hdd', '$cmrt', '$cmrs', '$ram', '$rom', '$thesim', '$dungluong')";
      $query5 = mysqli_query($conn, $sql5);
      if ($query5) {
        echo "<script>alert('Thêm sản phẩm thành công.')</script>";
        echo "<script>window.location='admin.php?categoryid=" . (int)$_GET['categoryid'] . "'</script>";
      } else
        echo "<script>alert('" . mysqli_error($conn) . "')</script>";
    }
  }
  ?>
  <?php include '../src/footer.php' ?>
</body>

</html>