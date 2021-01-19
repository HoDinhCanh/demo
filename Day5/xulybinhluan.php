<?php
session_start();
    $conn = mysqli_connect("localhost", "root", "", "banhang");
    $noidung = $_POST['noidung'];
    $id = $_POST['idsach'];
    // $idus = $_POST['idus'];
    $sql = "INSERT INTO binhluan (idsach, noidung) VALUES ($id,'$noidung')";
    $ketqua = mysqli_query($conn, $sql);
?>