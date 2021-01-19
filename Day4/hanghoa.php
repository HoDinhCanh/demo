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
<title>Danh sách hàng hoá</title>
</head>
<body>
<?php include 'menuad.php'?>
<h1>Chào Admin</h1>
<div class="form">
<h1>Hàng hoá</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên mặt hàng</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giá tiền</th>
      <th scope="col">Quyền Admin</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      while ($row = $rs->fetch_assoc()) {
        $query = ("SELECT * FROM danhmuc");
        $dms = $con->query($query);
        echo "<tr>";
        echo "<td>" .$i."</td>";
        echo "<td>" .$row['tenmathang']."</td>";
        echo  "<td>".$row['soluong']."</td>";
        echo  "<td>".$row['giatien']."</td>";
        while($row1 = $dms->fetch_assoc()){
            if($row1['id'] == $row["iddanhmuc"]) echo "<td>".$row1['tendanhmuc']."</td>";
        }
        echo  "<td><a href='updatehh.php?id=".$row['ID']."'>Sửa</a> || <a href='deletehh.php?id=".$row['ID']."'>Xóa</a></td>";
        echo "</tr>";
        $i++;
      }
    ?>
  </tbody>
</table>
<p>Bảng điều khiển</p>
<a href="themhh.php">Thêm sản phẩm</a>
<p>Đây cũng là một trang được bảo mật</p>
<p><a href="trangchu.php">Trang chủ</a></p>
<a href="#.php">Đăng xuất</a>

<!-- <a href="logout.php">Đăng xuất</a> -->-
</div>
</body>
</html>