<?php
require('database.php');
include('auth-dash.php');
$tmh = $_POST['tenmathang'];
$sl = $_POST['soluong'];
$gt = $_POST['giatien'];
$iddm = $_POST['iddanhmuc'];
$query = "INSERT INTO hanghoa(tenmathang,soluong,giatien,iddanhmuc) VALUE('$tmh','$sl','$gt','$iddm')";

if ($con->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

if ($query) {
    # code...
    header("location: hanghoa.php");
}
?>