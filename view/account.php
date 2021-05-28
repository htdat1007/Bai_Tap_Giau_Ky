<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tài khoản</title>

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
              $id = intval($_SESSION['user_id']);
              $sql = "select * from user where id=$id";
              $query = mysqli_query($conn, $sql);

              $num = mysqli_num_rows($query);

              if ($num > 0) {
                while ($row = mysqli_fetch_assoc($query)) {

                  //   }
                  // }
              ?>
                  <table>
                    <tr>
                      <td>
                        <h4 style="color: blue;font-size: 16px;font-weight: bold;padding-left: 1em;">Thông tin tài khoản:</h4>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-left: 1em;">
                        <label>Họ tên</label>
                      </td>
                      <td>
                        <span><?php echo $row['fullname']; ?></span>
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-left: 1em;">
                        <label>Email</label>
                      </td>
                      <td>
                        <span><?php echo $row['email']; ?></span>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-left: 1em;">
                        <label>Điện thoại di động</label>
                      </td>
                      <td>
                        <span><?php echo $row['phone'] ?></span>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-left: 1em;">
                        <label>Địa chỉ</label>
                      </td>
                      <td>
                        <span><?php echo $row['address']; ?></span>
                      </td>
                    </tr>
                  </table>
                  <br>
                  <div style="border: 1px dashed #dddddd">

                    <h4 style="color: blue;font-size: 16px;font-weight: bold;padding-left: 1em;">Địa chỉ nhận hàng</h4>
                    <fieldset class="field-address">
                      <p style="padding-left: 1em;">Khách hàng: <?php echo $row['username']; ?></p>
                      <p style="padding-left: 1em;">Địa chỉ: <?php echo $row['address']; ?></p>
                      <p style="padding-left: 1em;">Điện thoại: <?php echo $row['phone']; ?></p>
                    </fieldset>
                <?php
                }
              }
                ?>
                  </div>
                  <br>
                  <a href="edit_account.php" class="btn btn-warning" style="margin-left: 1em;font-weight: bold;">CHỈNH SỬA</a>
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