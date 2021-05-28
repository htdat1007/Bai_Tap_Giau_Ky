<?php
include '../libs/connect.php';
global $err;
if(isset($_POST['submit'])){
   
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

  
  $name = $_FILES['image']['name'] ;
  $name1 = $_FILES['image1']['name'];
  $name2 = $_FILES['image2']['name'];
  // $name3 = $_FILES['image3']['name'];

  // print_r($name1);
  //validate form???

  if($id == ''){
    
    header('Location: ../view/insert.php');
    $err = "nhap id";
  }

  $conn->set_charset("utf8");
  $sql = "INSERT INTO `product` (`productID`, `productName`, `description`, `price`, `discount`, `image`, `categoryID`, `dateupdate`, `soluonghientai`, `soluongconlai`) VALUES 
  ($id, '$pname', '$mota', $price, $discount, '{$name}', $category, '$date', $soluong, 20)";

  var_dump($sql);
  $query = mysqli_query($conn, $sql);
  if($query){
    echo "success";
  }
  else
    echo "false";

  //chèn 3 hình nhỏ
  $sql2 = "INSERT INTO `image` (`imageID`, `imageName`, `url`, `productID`, `choose`) 
           VALUES ('', '$pname', '{$name1}', $id, 1);";
  $query2 = mysqli_query($conn, $sql2);
  var_dump($query2);

  $sql3 = "INSERT INTO `image` (`imageID`, `imageName`, `url`, `productID`, `choose`)
           VALUES ('', '$pname', '{$name2}', $id, 1)";
  $query3 = mysqli_query($conn, $sql3);
  var_dump($query3);

  // $sql4 = "INSERT INTO `image` (`imageID`, `imageName`, `url`, `productID`, `choose`)
  //          VALUES ('', '$pname', '{$name3}', $id, 1)";
  // $query4 = mysqli_query($conn, $sql4);
  // var_dump($query4);

  //insert thong so 
  $sql5 = "INSERT INTO `ThongSo` (`thongsoID`, `productID`, `manhinh`, `HDD`, `CMRTruoc`, `CMRSau`, `RAM`, `ROM`, `thesim`, `dungluongPIN`)
           VALUES ('', $id, '$thongso', '$hdd', '$cmrt', '$cmrs', '$ram', '$rom', '$thesim', '$dungluong')";

  $query5 = mysqli_query($conn, $sql5);
  var_dump($query5);

  //test in kqua ra màn hình 
  $sql1="SELECT * FROM `product` WHERE productID=22";
  $query1 = mysqli_query($conn, $sql1);
  if($query1){
    if (mysqli_num_rows($query1) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($query1)) {

        echo "<img id='my' height='150' width='320' src='../img/$row[image]' class='reponsive' alt='hello'> ";
      }
    } else {
      echo "0 results";
    }
  }

  else
    echo "false";

}
else echo "vui lòng nhập dữ liệu vào trước khi nhấn submit";
