<?php
     session_start();
     ob_start();
?>
<html>
  <head>
	     <title>Bài tập 6</title>
	     <meta charset="utf-8" />
  </head>
  <body>
         <h1>Trang basket</h1>
	     <table border="1">
	         <tr>
 	           <th>Tên sản phẩm</th>
  	          <th>Số lượng</th>
  	          <th>Giá</th>
                <th>Thành tiền</th>
             </tr>
             <?php
     ob_end_flush();
?>
<?php
if(!$_SESSION['giohang']){
header('location:GioHang.php');
}

$tongTien = 0;
foreach($_SESSION['giohang'] as $hoa){
$thanhTien = $hoa['gia'] * $hoa['soluong'];
$tongTien += $thanhTien;
?>

<tr>
<td><?php echo $hoa['tenhoa'];?></td>
<td><?php echo $hoa['soluong'];?></td>
<td><?php echo number_format($hoa['gia'], 0, "."," ");?> VND</td>
<td><?php echo number_format($thanhTien, 0, "."," ");?> VND</td>
</tr>
<?php
}
?>
<tr>
<td colspan="4" align="right">Tổng tiền: <?php echo number_format($tongTien, 0, "."," ");?> VND</td>
</tr>
         </table>
	     <a href="GioHang.php">Quay lại</a>

   </body>
</html>

