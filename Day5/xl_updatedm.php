<?php
require('database.php');
include('auth-dash.php');
$id = $_POST['id'];
$tdm = $_POST['tendanhmuc'];
$query = "UPDATE danhmuc SET tendanhmuc = '$tdm' WHERE id= '$id'";

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