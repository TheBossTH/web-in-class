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
    <table>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียดสินค้า</th>
            <th>ราคา</th>
        </tr>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute(); 
    while ($row = $stmt->fetch()) {
        echo "<tr><td>" . $row["pid"]. "</td><td>" . $row["pname"] . "</td><td>" . $row ["pdetail"] . "</td><td>" . $row ["price"] . "</td></tr>";
        }
    ?>
    </table>
</body>
</html>