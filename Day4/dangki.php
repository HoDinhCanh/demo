<?php
    $mess = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $u = $_POST["username"];
        $p = $_POST["password"];
        $conn = mysqli_connect("localhost","root","","shop");
        $sql = "SELECT id FROM users WHERE username = '$u'";
        $kq = mysqli_query($conn, $sql);
        if (mysqli_num_rows($kq) > 0)
        {
            $mess = "Ten dang nhap nay da ton tai.";
        }
        else
        {
            $sql= "INSERT INTO users(username, password, authorities) VALUES('$u','$p','khach')";
            $ketqua = mysqli_query($conn,$sql);
            $mess = "Ban dang ky thanh cong";
        }
    }   
?>
<html>
<?php include 'menu.php'?>
    <head>
        <meta charset="utf-8">
        <title>Đăng ký</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>

        
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/vendor/jquery-ui/jquery-ui.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style1.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container" >
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <div style= "font-size: 30px;">Đăng Nhập</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">username</label>
                                <input type="text" class="form-input" name="username" id="first_name" placeholder="Tên đăng nhập" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-input" name="password" id="password" placeholder="Mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label for="re_password">Repeat your password</label>
                                <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu"/>
                            </div>
                            <div>
                               <?php  echo $mess; ?> 
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Đăng ký"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery1/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="assets/js/main1.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

    </body>

</html>
