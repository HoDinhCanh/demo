<?php
require('database.php');
include('auth-dash.php');
// $ID = $_GET['id'];
// $query = "SELECT * FROM hanghoa WHERE ID = '$ID'";
// $rs = $con->query($query);
// $row = $rs->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thêm danh mục</h1>

    <form action="xl_themdm.php" method="POST">
        Tên danh mục:<input type="text" name="tendanhmuc" id="" value=""><br>
        <form action="xl_themdm.php">
                <input type="submit" value="Thêm danh mục">
        </form>

    </form>
</body>
</html>