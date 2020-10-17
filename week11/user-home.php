<?php session_start(); ?>
<html>

<body>
    <h1>สวัสดี<?= $_SESSION["fullname"] ?></h1>
    <h1><?= $_SESSION['username'] ?></h1>
    <a href="./product-list.php">PD List</a>
    <!-- SELECT product.pname,item.quantity,orders.ord_id FROM `orders` JOIN product,item WHERE orders.ord_id=item.ord_id AND item.pid=product.pid AND orders.username='baramee' -->
    หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>

</html>