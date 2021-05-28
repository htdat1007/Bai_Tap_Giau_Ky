<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chỉnh sửa tài khoản</title>

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
      <li><a href="#">Tài khoản</a></li>
    </ol>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-xs-0 col-sm-0"></div>
      <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
        <div class="single-product-widget">
          <div class="list-group-item">
            <fieldset>
              <?php

              $conn->set_charset("utf8");
              $id = (int)$_SESSION['user_id'];
              $sql1 = "select * from user where id = $id";
              $query1 = mysqli_query($conn, $sql1);

              if ($query1) {
                while ($row = mysqli_fetch_assoc($query1)) {

                  //   } 
                  // }
                  // else
                  //   echo "false";
              ?>

                  <h4 style="color:blue;font-weight:bold;text-align:center"> Chỉnh sửa thông tin cá nhân</h4>
                  <form action="" method="POST">
                    <div class="form-group row">
                      <label for="ten" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $row['username'] ?>" placeholder="Nguyễn Văn A">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" id="inputEmail3" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="matkhau" id="inputPassword3" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputphone" class="col-sm-2 col-form-label">Số điện thoại</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="dienthoai" value="<?php echo $row['phone'] ?>" id="inputphone" placeholder="0123456789">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputaddr" class="col-sm-2 col-form-label">Địa chỉ</label>
                      <div class="col-sm-10">
                        <input type="text" name="diachi" value="<?php echo $row['address'] ?>" id="inputaddr" class="form-control" placeholder="quận 3, tphcm">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <input type="submit" name="submit" class="btn btn-warning" value="CẬP NHẬT">
                      </div>
                    </div>

                  </form>
              <?php
                }
              } else
                echo "false";

              if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($conn, $_POST['ten']);
                $pass = mysqli_real_escape_string($conn, $_POST['matkhau']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $addr = mysqli_real_escape_string($conn, $_POST['diachi']);
                $phone = (int)$_POST['dienthoai'];
                $check1 = $check2 = $check3 = $check4 = $check5 = false;

                if (empty($name) || (strlen($name) < 5)) {
                  echo "Tên sai cú pháp<br>";
                } else
                  $check1 = true;

                if (empty($pass) || (strlen($pass) < 5)) {
                  echo "Mật khẩu sai cú pháp<br>";
                } else {
                  $pass = md5($pass);
                  $check2 = true;
                }

                $sql2 = "SELECT * FROM `User` WHERE (email = '$email')";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($query2);

                if (empty($email)) {
                  echo "Email không được bỏ trống.<br>";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo "Email phải theo định dạng <sth>@<sth>.<sth>";
                } else if ($row) {
                  echo "Email đã tồn tại.<br>";
                } else {
                  $check3 = true;
                }

                if (empty($phone)) {
                  echo "Điện thoại không được bỏ trống.<br/>";
                } else if (is_numeric($phone) && strlen($phone) > 11) {
                  echo "Số điện thoại không hợp lệ.";
                } else {
                  $check4 = true;
                }
                if (empty($addr)) {
                  echo " Địa chỉ không được bỏ trống.";
                } else if (strlen($addr) > 500) {
                  echo "Địa chỉ không được lớn hơn 500 ký tự.";
                } else {
                  $check5 = true;
                }

                if ($check1 && $check2 && $check3 && $check4 && $check5) {
                  $sql = "update user set username='$name', email='$email', password='$pass', phone=$phone, address='$addr' where id=$id";
                  $query = mysqli_query($conn, $sql);
                  if ($query) {
                    echo "<script>alert('edit success') </script>";
                    echo "<script>window.location='account.php'</script>";
                  } else
                    echo "false";
                } else
                  echo "<script>alert('Dữ liệu bạn nhập chưa đúng. Vui lòng nhập lại')</script>";
              }
              ?>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-xs-0 col-sm-0"></div>
    </div>
  </div>
  <!-- Footer -->
  <?php include '../src/footer.php' ?>

</body>

</html>