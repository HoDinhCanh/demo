<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chu</title>
    <!-- Bootstrap core CSS -->
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
<body>
<?php
            session_start();
                include 'menu.php';
?>
    <div class="container">
        
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Chủ đề
                    </a>
                    <ul class="list-group">
                    <?php
                        $connect=mysqli_connect("localhost","root","","banhang");
                        $sql1="select * from danhmuc";
                        $query1=mysqli_query($connect,$sql1);
                        if(mysqli_num_rows($query1) > 0)
                        {
                        while($row1=mysqli_fetch_array($query1))
                        {
                            ?>
                        <li class="list-group-item"><?php echo  '<a href="search.php?id='.$row1['id'].'">'.$row1['tendanhmuc'].'</a>';?>
                        </li>
 <?php
}
}
?>
                    </ul>
                </div>
                <div>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success"><a href="#">Sách sắp ra </a></li>
                        <li class="list-group-item list-group-item-info"><a href="#">Sách mới</a></li>
                        <li class="list-group-item list-group-item-warning"><a href="#">Sách giảm giá</a></li>
                        <!-- <li class="list-group-item list-group-item-danger"><a href="#">C</a></li> -->
                    </ul>
                </div>
                <!-- /.div -->
                <div class="well well-lg offer-box offer-colors">


                    <span class="glyphicon glyphicon-star-empty"></span>25 % off  , Mua ngay                 
              
                   <br />
                    <br />
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                            style="width: 70%">
                            <span class="sr-only">70% Complete (success)</span>
                            2hr 35 mins còn lại
                        </div>
                    </div>
                    <a href="#">Nhấn vào đây để biết thêm </a>
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Sách</a></li>
                        <!-- <li class="active">Electronics</li> -->
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                    <form class="navbar-form navbar-right" name="search" method="POST" role="Tìm kiếm" action="search.php">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Nhập tên sách" class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" name="ok" class="btn btn-primary">Tìm</button>
                </form>

                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search =($_POST['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yêu cầu nhập dữ liệu";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from books where title like '%$search%'";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "banhang");
 
                // Thực thi câu truy vấn
                $sql = mysqli_query($conn,$query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    echo "$num Kết quả trả về với từ khoá <b>$search</b>";
                    ?>
                     <div class="row">

                    <?php
                    // Dùng $num để đếm số dòng trả về.
                     
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysqli_fetch_assoc($sql)) {?>   
                        <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                             <img style="height: 200px; wight: 400px;" src="./images/<?php echo $row['linkimage']; ?>" alt="" />
                            <div class="caption">
                               <?php echo "<h3><a href='chitiet.php?id=$row[id]'>$row[title]</a></h3>";?> 
                                <p>Tác giả : <strong><?php echo $row['author']; ?></strong>  </p>
                                <p>Giá : <strong> <?php echo number_format($row['price'],3); ?>
                                VND<br /></strong>  </p>
                                <p><a href="addcart.php?item=<?php echo $row['id'];?>" class="btn btn-success" role="button">Thêm vào giỏ hàng</a> <a href="detail.php?item=<?php echo $row['id'];?>" class="btn btn-primary" role="button">Chi tiết</a></p>
                            </div>
                        </div>
                    </div>
                    
                   <?php }
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
                ?>
                    </div>
                <?php
            }
        }
        ?>

    

                </div>


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="col-md-12 download-app-box text-center">

        <span class="glyphicon glyphicon-download-alt"></span>Tải ứng dụng của chúng tôi và được giảm giá 10% tất cảc các sản phẩm . <a href="#" class="btn btn-danger btn-lg">Tải ngay</a>

    </div>

    <!--Footer -->
    <div class="col-md-12 footer-box">
        <div class="row">
            <div class="col-md-4">
                <strong>Giải đáp thắc mắc </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Tên">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Địa chỉ Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Tin nhắn"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đồng ý gửi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Địa chỉ của chúng tôi</strong>
                <hr>
                <p>
                     Đà Nẵng,<br />
                                    Đại học Đà Nẵng<br />
                    Call: 0934746662<br>
                    Email: hdcanh.19it3@sict.udn.vn<br>
                </p>

                2020 www.canhho.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>Xã hội </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2020 | &nbsp; All Rights Reserved | &nbsp; www.winshop.com | &nbsp; 24/7 support | &nbsp; Email us: hdcanh.19it3@vku.udn.vn
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>


           

