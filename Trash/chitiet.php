<?php
session_start();
?>
<html>
    <head>
        <title>Chi tiết</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
        $(document).ready(function(){
           $("#guibinhluan").click(function(){
              var url_string = window.location.href;
              var url = new URL(url_string);
          
              var idsp = url.searchParams.get("item");
            
              var txt = $("#noidungbinhluan").val();
              $.post("xulybinhluan.php", {noidung: txt, idsach: idsp}, function(result){
                $("#dsbinhluan").append('<hr>'+ txt);
              });
           }); 
        });
    </script>

    <body>
        <h1>Chi tiết</h1>
        <?php
            $id = $_GET['item'];
            $ketnoi = mysqli_connect("localhost", "root", "", "banhang");
            $sql = "SELECT * FROM books WHERE id=$id";
            $ketqua = mysqli_query($ketnoi, $sql);
            $sp = mysqli_fetch_assoc($ketqua);

                echo '<p>Ten sach: '.$sp['id'].'.'.$sp['title'].'<br>';
                echo '<p>Gia: '.$sp['price'].'<br>';
                echo '<a href="addcart.php?id='.$sp['id'].'">Mua</a></p>';
                echo '<hr>';
                echo '<h2>Bình luận</h2>';
        ?>
     
            <input type="text" name="noidungbinhluan" id="noidungbinhluan">
            <input type="submit" value="Gửi"  id="guibinhluan">
    
        

        <?php
            $sql = "SELECT * FROM binhluan WHERE idsach = $id";
            $ketqua1 = mysqli_query($ketnoi, $sql);
            while($dong = mysqli_fetch_assoc($ketqua1))
            {
                echo"<p>".$dong['noidung'].'<p><hr>';
            }
        ?>
        <div id="dsbinhluan">
        </div>
    </body>
</html>