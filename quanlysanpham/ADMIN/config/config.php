<?php
$conn = new mysqli("localhost","root","","quanlysanpham");
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
mysqli_set_charset($conn,"utf8_general_ci");
?>