<?php
include '../libs/connect.php';
session_start(); 
if(isset($_POST["submit"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

  if($email == "" || $password == ""){
    echo "error";
  }

  $sql = "SELECT * FROM `User` WHERE (email = '$email' AND password = '$password')";
  $query= mysqli_query($conn, $sql);
  $row= mysqli_fetch_array($query);

  if($row){
    $_SESSION['user_id'] = $row['id'];
    header("Location: ../view/index.php");
    $_SESSION['username'] = $row['username'];
    echo $_SESSION['username'];

  }
  else{ 
    echo "Email hoặc mật khẩu không đúng.";
    header("Location: ../view/login.php");
  }

}
