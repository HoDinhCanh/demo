<html>
<head>
<title>Bài tập 2</title>
<meta charset="utf-8" />
<style>
body{
width: 500px;
margin: 20px auto;
}
h4{
background-color: #00A19C;
padding: 10px;
margin-bottom: 0px;
color: white;
}
div{
background-color: #C7EEEB;
padding: 5px;
}
</style>
</head>
<body>
<?php
session_start();  //Session có thể sử dụng sau khi chèn đoạn này
ob_start();  //Sử dụng được hàm header();
?>

<form action="" method="post">
<h4>Mua hoa</h4>
<div>
<p><label>ID hoa: </label><input type="text" name="id" value=""></input></p>
<p><label>Tên hoa: </label><input type="text" name="ten" value=""></input></p>
<p><label>Số lượng: </label><input type="number" name="soluong" value=""></input></p>
<p><label>Giá:</label><input type="number" name="gia" value=""></input></p>
<input type="submit" name="submit" value="Mua hoa"></input>
</div>
</form>
<?php
ob_end_flush();
?>
<?php
if(isset($_POST['submit'])){
$id = $_POST['id'];
$tenhoa = $_POST['ten'];
$soluong = $_POST['soluong'];
$gia = $_POST['gia'];
if(!isset($_SESSION['giohang'][$id])){
$_SESSION['giohang'][$id] = array(
'tenhoa' => $tenhoa,
'soluong' => $soluong,
'gia' => $gia
);
}else{
$_SESSION['giohang'][$id]['soluong'] += $soluong;
}
header('location:basket.php');
}
?>

</body>
</html>
