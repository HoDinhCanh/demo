
Menu: <a href="./index.php">Trang chủ </a>|<a href="login.php">Đăng nhập</a>|<a href="GioHang.php">Giỏ hàng</a>|<a href="registration.php">Đăng ký</a>|<a href="dashboard.php">Dành cho Admin</a>
<?php
session_start();
if(!empty($_SESSION["name"])){
echo "Chao ". $_SESSION["name"];
}
?>
