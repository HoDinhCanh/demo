
Menu:<a href="dshanghoa.php">Danh sách hàng hoá</a>|<a href="list_accout.php">Quản lý tài khoản</a>
<?php
if(!empty($_SESSION["name"])){
echo "Chao ". $_SESSION["name"];
}
?>
