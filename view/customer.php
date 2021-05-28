<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Phản hồi của khách hàng</title>

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
      <li><a href="#">Phản hồi</a></li>
    </ol>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-xs-0 col-sm-0"></div>
      <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
        <div class="single-product-widget">
          <div class="list-group-item">
            <form class="form-horizontal form-without-legend" action="" method="post">
              <h2 style="color: blue; font-size: 30px;">Phản hồi của bạn:</h2>
              <div class="form-group">
                <label for="title" class="col-lg-3 control-label">Tiêu đề <span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="title" name="title">
                </div>
              </div>
              <div class="form-group">
                <label for="content" class="col-lg-3 control-label">Nội dung <span class="require">*</span></label>
                <div class="col-lg-8">
                  <textarea type="text" class="form-control" id="content" name='content' style="height: 10em"></textarea>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" style="font-weight:bold;margin-right: 1em;float: right;" class="btn btn-warning" value="Gửi">

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-xs-0 col-sm-0"></div>
    </div>
  </div>

  <?php
  $conn->set_charset("utf8");
  if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    if (!empty($title) && !empty($content)) {
      $sql = "insert into contact(title, content) values ('$title', '$content')";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        echo "<script>alert('Phản hồi của bạn đã được ghi nhận.')</script>";
      } else
        echo "<script>alert('Bạn vui lòng nhập đủ thông tin.')</script>";
    } else
      echo "<script>alert('Bạn vui lòng nhập đủ thông tin.')</script>";
  }
  ?>
  <!-- Footer -->
  <?php include '../src/footer.php' ?>


</body>

</html>