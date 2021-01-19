<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include 'menu.php'?>
<?php
  require('database.php');
  // session_start();
    if (isset($_POST['username'])){
    
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM `admin` WHERE user='$username' and Password='$password'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: list_accout.php");
            }else{
        echo "<div class='form'><h3>Tên đăng nhập hoặc mật khẩu không đúng!</h3></br><a href='dashboard.php'>Đăng nhập lại</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Đăng nhập dashboard</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Tên đăng nhập" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<input name="submit" type="submit" value="Đăng nhập" />
</form>
<!-- <p>Bạn chưa có tài khoản? <a href='registration.php'>Đăng ký ngay</a></p><br/> -->

</div>
<?php } ?>
</body>
</html>