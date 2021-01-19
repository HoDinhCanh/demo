<?php  
echo "<div id=cart>";
echo "<h3>$row[title]</h3>";
echo "Tac Gia: $row[author] - Gia: ".number_format($row['price'],3)."
VND<br />";
echo "<p align='right'><a href='addcart.php?id=$row[id]'>Mua Sach
Nay</a></p>";
echo "<p align='right'><a href='delcart.php?item=$row[id]'>xoa</a></p>";
echo "<input type='number' name='".$row['id']."' min='1' max='50' id='' value='".$_SESSION['cart'][$row['id']]."'> <br>";
echo "              Tong tien:".number_format($_SESSION['cart'][$row['id']]*$row['price'],3)."VND";
$price+=$_SESSION['cart'][$row['id']]*$row['price'];
echo "</div>";
}
echo "Price: ".number_format($price,3)."VND";
echo "<p align='right'><a href='delcart.php?item=0'>xoa all</a></p>";
echo "<input type='submit' value='Cap nhat' name ='capnhat'>";
}

 }

 else{
     echo "Khong co san pham <br>";
     echo '<a href="trangchu.php">Về trang chủ<a>';
 }
 
?>