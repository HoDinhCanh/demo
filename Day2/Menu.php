
Menu: <a href="./Menu.php">Trang chu </a>|<a href="DangNhap.php">Dang Nhap</a>|<a href="GioHang.php">GioHang</a>
<?php
session_start();
if(!empty($_SESSION["name"])){
echo "Chao ". $_SESSION["name"];
}
?>
