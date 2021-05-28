<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "database";

global $conn;
$conn  = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
  die(mysqli_connect_error());
}
