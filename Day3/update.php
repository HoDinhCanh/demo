<?php
require('database.php');
include('auth-dash.php');

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
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
    <h1>Cập nhập tài khoản</h1>

    <form action="xl_update.php" method="POST">
             <input type="hidden" name="id" value="<?php echo $id; ?>">
        User:<input type="text" name="username" id="" value="<?php echo $row['username']; ?>"><br>
        Pass:<input type="text" name="password" id="" value="<?php echo $row['password']; ?>"><br>
        mail:<input type="text" name="email" id="" value="<?php echo $row['email']; ?>"><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>