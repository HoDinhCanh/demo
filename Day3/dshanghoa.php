<?php
require('database.php');
include('auth-dash.php');
$query = ("SELECT * FROM hanghoa");
$rs = $con->query($query);
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Quản lý hàng hoá</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include 'menuAdmin.php'?>
<h1>Chào Admin</h1>
<div class="form">
<h1>List hàng hoá</h1>
<select name="iddanhmuc"> <?php
$sql = "SELECT * FROM danhmuc"; 
$ketqua = mysqli_query($con, $sql); 
while ($row = mysqli_fetch_assoc($ketqua)){
    echo '<option value="'.$row[ 'ID'].'">' .$row['Danhmuc'].'</option>';
}
?>
</select>

<br><br>
<table border="1">
<tr>
    <th>
        STT
    </th>
    <th>
    Tên sản phẩm
    </th>
    <th>
    Số lượng
    </th>
    <th>
    giá tiền
    </th>
    <th>Quyền ADMIN</th>
</tr>
<?php

if(isset($_GET['iddanhmuc'])){

    $sql1 = "SELECT * FROM hanghoa WHERE IDdanhmuc=".$_GET['iddanhmuc']; 
    echo $_GET['iddanhmuc'];
    echo "ton tai";
    $ketqua1 = mysqli_query($con, $sql1); 
  $i = 1;
  while ($row1 = mysqli_fetch_assoc($ketqua1)) {
    echo "<tr>";
    echo "<td>" .$i."</td>";
    echo "<td>" .$row1['tenmathang']."</td>";
    echo  "<td>".$row1['soluong']."</td>";
    echo  "<td>".$row1['giatien']."</td>";
    echo  "<td>".$row['']."</td>";
    echo  "<td><a href='update.php?id=".$row1['ID']."'>Sửa</a> || <a href='delete.php?id=".$row1['ID']."'>Xóa</a></td>";
    echo "</tr>";
    $i++;
  }
}else{
    echo "  sai";
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
