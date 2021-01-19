<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/icon_HLB.png" /> -->
    <title>Chi tiết</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />

</head>
<?php
    session_start();
        include 'menu.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
        $(document).ready(function(){
           $("#guibinhluan").click(function(){
              var url_string = window.location.href;
              var url = new URL(url_string);
          
              var idsp = url.searchParams.get("item");
            //   var idus = $_SESSION['idusers'];
              var txt = $("#noidungbinhluan").val();
              $.post("xulybinhluan.php", {noidung: txt, idsach: idsp}, function(result){
                $("#dsbinhluan").append('<hr>'+ txt);
              });
           }); 
        });
    </script>
<body>
<?php
            $id = $_GET['item'];
            // if(isset($_SESSION['idusers'])){
            //     $idus = $_SESSION['idusers'];
            // }
            $ketnoi = mysqli_connect("localhost", "root", "", "banhang");
            $sql = "SELECT * FROM books WHERE id=$id";
            $ketqua = mysqli_query($ketnoi, $sql);
            $sp = mysqli_fetch_assoc($ketqua);
        ?>
    <div class="container-fluid app-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 main-header-left">
                    <div class="row">
                        <div class="col-sm-7">
                            <img style="height: 300px; wight: 300px;" src="./images/<?php echo $sp['linkimage']; ?>" class="left-img">
                        </div>
                        <div style="top:100px; font-size: 18px;" class="col-sm-5">
                            <div class="detail-title">
                            <?php  echo $sp['title'];  ?>
                            </div>
                            <div class="detail-infor">
                                Tác giả:<?php echo $sp['author'] ?>
                            </div>
                            <div class="details-price">
                            <?php  echo number_format($sp['price'],3).' VND';  ?>
                            </div>
                            <div class="details-tourism">
                                Chi tiết 
                                <a href=""> Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 main-header-right">
                    <div class="right-wrap">
                        <div class="right-infor">
                        </div>
                        <div class="form-group">
                        </div>
                       
                        <div style="padding-top: 100px;" class="book-btn">
                       <?php if (isset($_SESSION["username"])) {?>
                        <p><a href="addcart.php?item=<?php echo $_GET['item'];?>" class="btn btn-success" role="button">Thêm vào giỏ hàng</a></p>
                       <?php }else{?><p><a href="dangnhap1.php" class="btn btn-success" role="button">Đăng nhập để thêm vào giỏ hàng</a></p>
                       <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="details-program">
                        <div class="details-program-title">
                            <span> <h2>Bình luận</h2></span>
                        </div>
                        <div class="details-program-content">

        
                <div class="program-content-title text-center">
                    <b><?php  echo $sp['title'];?></b></br>
                </div>
                <?php
                echo '<hr>';
        ?>
     <?php 
     if(isset($_SESSION['username'])){?>
     <input type="text" name="noidungbinhluan" id="noidungbinhluan">
            <input type="submit" value="Gửi"  id="guibinhluan">
    
<?php
     } else {?><p><a href="dangnhap1.php" class="btn btn-success" role="button">Đăng nhập để bình luận</a></p>
     <?php } ?>
     
            
        

        <?php
            $sql = "SELECT * FROM binhluan WHERE idsach = $id";
            $ketqua1 = mysqli_query($ketnoi, $sql);
            while($dong = mysqli_fetch_assoc($ketqua1))
            {
                // $row1 = mysqli_fetch_assoc($ketqua2);
                echo"<p>".$dong['noidung'].'<p><hr>';
            }
        ?>
        <div id="dsbinhluan">
        </div>

                            <div class="program-content-title text-center" >
                                <b><?php  echo $sp['title'];  ?></b></br>
                            </div>
                            <div class="program-content">
                                <h2>Đây là phần tóm tắt nội dung của cuốn sách.</h2>
                                <br><br>
                                Tóm lại cuốn sách này tên là <?php  echo $sp['title'];?>
                                <br>
                                - Cuốn sách này khá là cái gì đó mà nhưng không thể khó có thể đánh giá được.
                                <br>
                                - Khá là nhiều điều được nhắc đến trong cuốn sách <?php  echo $sp['title'];?> này không thể liệt kê hết được.
                                Để liệt kê hết thì mất cả tháng nên vui lòng mua về đọc.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>