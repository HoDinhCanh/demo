<!DOCTYPE html>
<html>
<head>
<title>Form</title>

</head>
<body>
<?php include 'Menu.php'?>
<?php 
   $nameerr=$passerr="";
   if($_SERVER["REQUEST_METHOD"]=="POST"){
       if(empty($_POST["username"])){
$nameerr="Bạn cần nhập tên";
       }
       else{  
           if(preg_match("/^[a-z0-9-' ]*$/",$_POST["username"])){
               $nameerr="";
           }else{
               $nameerr="có kí tự không hợp lệ";
           }
       }
      if(empty($_POST["password"])){
          $passerr="Bạn cần nhập mật khẩu";
      }
      if($nameerr==''&&$passerr==''){
      $_SESSION["name"] = $_POST["username"];
      $_SESSION["pass"] = $_POST["password"];
      header('location:menu.php');
      }
   }
   ?>
   <form action="DangNhap.php" method="POST">
   Username: <input type="text" name="username" id=""><?php echo $nameerr ?><br>
   Password: <input type="password" name="password" id=""><?php echo $passerr ?><br>
   <input type="submit" value="submit">
   </form> 
  
</body>
</html>