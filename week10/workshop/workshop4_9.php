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
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
    <div style="display:flex">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
            if (!empty($_GET))
            $value = '%' . $_GET["keyword"] . '%';
            $stmt->bindParam(1, $value); 
            $stmt->execute(); 
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
        <div style="padding: 15px; text-align: center">
            ชื่อสมาชิก : <?=$row ["name"]?><br>
            ที่อยู่ : <?=$row ["address"]?><br>
            อีเมล :<?=$row ["email"]?><br>
            <img src="./img/<?=$row ["username"]?>.jpg" alt="" width='100'>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>