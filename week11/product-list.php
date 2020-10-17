<?php
include "connect.php";
session_start();
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
}
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT product.pname,item.quantity,orders.ord_id,product.price FROM `orders` JOIN product,item WHERE orders.ord_id=item.ord_id AND item.pid=product.pid AND orders.username=?");
    $stmt->bindParam(1,$_SESSION['username']);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "order_id: " . $row['ord_id'] . "<br/>";
        echo "ชื่อสินค้า: " . $row["pname"] . "<br>";
        echo "ราคา: " . $row["price"] . " บาท <br>";
        echo "<hr>\n";
    }
    
    ?>
    <a href="./user-home.php">backhome</a>
</body>

</html>