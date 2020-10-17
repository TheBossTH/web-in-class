<!DOCTYPE html>
<?php include "connect.php"?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute(); 
    while ($row = $stmt->fetch()) {
        ?>
        รหัสสินค้า:<?=$row ["pid"]?><br>
        ชื่อสินค้า:<?=$row ["pname"]?><br>
        รายละเอียดสินค้า:<?=$row ["pdetail"]?><br>
        ราคา: <?=$row ["price"]?> บาท<br><hr>
        <?php
        }
    ?>
</body>
</html>