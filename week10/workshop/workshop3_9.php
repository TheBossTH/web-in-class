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
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute(); 
    while ($row = $stmt->fetch()) {
        ?>
        ชื่อสมาชิก : <?=$row ["name"]?><br>
        ที่อยู่ : <?=$row ["address"]?><br>
        อีเมล :<?=$row ["email"]?><br>
        <img src="./img/<?=$row ["username"]?>.jpg" alt="" width='100'><hr>
        <?php
        }
    ?>
</body>
</html>