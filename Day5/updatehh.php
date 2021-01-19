<?php
require('database.php');
include('auth-dash.php');
$ID = $_GET['id'];
$query = "SELECT * FROM books WHERE id = '$ID'";
$rs = $con->query($query);
$row = $rs->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cập nhập hàng hoá</h1>

    <form action="xl_updatehh.php" method="POST">
             <input type="hidden" name="id" value="<?php echo $ID; ?>">
        Tên sản phẩm:<input type="text" name="tenmathang" id="" value="<?php echo $row['title']; ?>"><br>
        Tác giả:<input type="text" name="author" id="" value="<?php echo $row['author']; ?>"><br>
        Giá tiền:<input type="text" name="giatien" id="" value="<?php echo $row['price']; ?>"><br>
        <form action="xl_updatehh.php">
            <label for="danhmuc">Danh mục:</label>
                <select name="iddanhmuc">
                    <?php
                     $query1 = "SELECT * FROM danhmuc";
                     $rs2 = $con->query($query1);
                   
                        while($row2=$rs2->fetch_assoc()){?>
                            <option value="<?php echo $row2['id'];?>"><?php echo $row2['tendanhmuc'];?></option>

                            <?php
                        }
                    ?>
                </select>
                <br><br>
                <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><br>
  <input type="submit" value="Upload" name="submit">
</form>
            
        </form>

    </form>
</body>
</html>