<?php
require('database.php');
include('auth-dash.php');

$id = $_POST['id'];
$tmh = $_POST['tenmathang'];
$sl = $_POST['soluong'];
$gt = $_POST['giatien'];
$iddm = $_POST['iddanhmuc'];
$query = "UPDATE hanghoa SET tenmathang = '$tmh', soluong = '$sl', giatien = '$gt', iddanhmuc ='$iddm' WHERE ID= '$id'";

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