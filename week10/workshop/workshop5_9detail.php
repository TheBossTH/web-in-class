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
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]);
        $stmt->execute();
        $row = $stmt->fetch();
    ?>
    <div style="display:flex">
        <div style="padding: 15px">
            <h2><?=$row["name"]?></h2>
            ที่อยู่ : <?=$row ["address"]?><br>
            อีเมล :<?=$row ["email"]?><br>
            <img src="./img/<?=$row ["username"]?>.jpg" alt="" width='100'>
        </div>
    </div>
</body>
</html>