<?php
require('database.php');
include('auth-dash.php');
$tdm = $_POST['tendanhmuc'];
$query = "INSERT INTO danhmuc(tendanhmuc) VALUE('$tdm')";

if ($con->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

if ($query) {
    # code...
    header("location: danhmuc.php");
}
?>