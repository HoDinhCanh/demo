<?php
 require('database.php');
 include('auth-dash.php');
$query = ("SELECT * FROM danhmuc");
$rs = $con->query($query);
// include("auth.php");
  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách hàng hoá</title>
</head>
<body>
<?php include 'menuad.php'?>
<h1>Chào Admin</h1>
<div class="form">
<h1>Danh mục</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Quyền Admin</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      while ($row = $rs->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" .$i."</td>";
        echo "<td>" .$row['tendanhmuc']."</td>";
        echo  "<td><a href='suadanhmuc.php?id=".$row['id']."'>Sửa</a> || <a href='xoadanhmuc.php?id=".$row['id']."'>Xóa</a></td>";
        echo "</tr>";
        $i++;
      }
    ?>
  </tbody>
</table>
<p>Bảng điều khiển</p>
<a href="themdm.php">Thêm danh mục</a>
<p>Đây cũng là một trang được bảo mật</p>
<p><a href="trangchu.php">Trang chủ</a></p>
<a href="#.php">Đăng xuất</a>

<!-- <a href="logout.php">Đăng xuất</a> -->
</div>
</body>
</html>