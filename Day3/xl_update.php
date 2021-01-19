<?php
require('database.php');
include('auth-dash.php');

$id = $_POST['id'];
$u = $_POST['username'];
$p = $_POST['password'];
$mail = $_POST['email'];
$query = "UPDATE users SET username = '$u', password = '$p', email = '$mail' WHERE id= '$id'";

if ($con->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

if ($query) {
    # code...
    header("location: list_accout.php");
}
?>