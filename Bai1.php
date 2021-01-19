<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy tính đơn giản</title>
</head>
<body>
    <form action="Bai1.php" method="get">
        x: <input type="text" name="x" ><br>
        x: <input type="text" name="y" ><br>
        Phép toán: <input type="text" name="pt" ><br>
        <input type="submit" name="submit" value="Tính"><br>
    </form>
</body>
</html>
<?php
    $x = $_GET["x"];
    $y = $_GET["y"];
    $pt = $_GET["pt"];
    if($pt=="+"){
        echo (float)($x + $y);
    }
    if($pt=="-"){
        echo (float)($x - $y);
    }
    if($pt=="*"){
        echo (float)($x * $y);
    }
    if($pt=="/"){
        echo (float)($x / $y);
    }

?>