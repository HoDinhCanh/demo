<?php
require('database.php');
include('auth-dash.php');
$ID = $_GET['id'];
$query = "SELECT * FROM danhmuc WHERE id = '$ID'";
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
    <h1>Cập nhập danh mục</h1>

    <form action="xl_updatedm.php" method="POST">
             <input type="hidden" name="id" value="<?php echo $ID; ?>">
        Tên danh mục:<input type="text" name="tendanhmuc" id="" value="<?php echo $row['tendanhmuc']; ?>"><br>
        <form action="xl_updatedm.php">
            <br><br>
                <input type="submit" value="Cập nhật">
        </form>

    </form>
</body>
</html>