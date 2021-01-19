<?php
require('database.php');
include('auth-dash.php');
$query = ("SELECT * FROM users");
$rs = $con->query($query);
// include("auth.php");
  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include 'menuAdmin.php'?>
<h1>Chào Admin</h1>
<div class="form">
<h1>List Users</h1>
<table border="1">
<tr>
    <th>
        STT
    </th>
    <th>
    USER
    </th>
    <th>
    Password
    </th>
    <th>Email</th>
    <th>Quyền ADMIN</th>
</tr>
<?php

  $i = 1;
  while ($row = $rs->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" .$i."</td>";
    echo "<td>" .$row['username']."</td>";
    echo  "<td>".$row['password']."</td>";
    echo  "<td>".$row['email']."</td>";
    echo  "<td><a href='update.php?id=".$row['id']."'>Sửa</a> || <a href='delete.php?id=".$row['id']."'>Xóa</a></td>";
    echo "</tr>";
    $i++;
  }
?>
</table>
<p>Bảng điều khiển</p>
<p>Đây cũng là một trang được bảo mật</p>
<p><a href="index.php">Trang chủ</a></p>
<a href="logout-dash.php">Đăng xuất</a>

<!-- <a href="logout.php">Đăng xuất</a> -->
</div>
</body>
</html>