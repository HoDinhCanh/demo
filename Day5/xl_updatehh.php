<?php
require('database.php');
include('auth-dash.php');

$id = $_POST['id'];
$tmh = $_POST['tenmathang'];
$tg = $_POST['author'];
$gt = $_POST['giatien'];
$iddm = $_POST['iddanhmuc'];
$filename = $_POST['fileToUpload'];
$query = "UPDATE books SET title = '$tmh', author = '$tg', iddanhmuc ='$iddm',price = '$gt',linkimage ='$filename' WHERE id= $id";

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