<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
    $row = $stmt->fetch();
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="workshop9_9editmember.php" method="post">
    Username : <input type="text" name="username" value="<?=$row["username"]?>" disabled><br><br>
    Password : <input type="password" name="password" value="<?=$row["password"]?>"><br><br>
    ชื่อ-สกุล : <input type="text" name="name" value="<?=$row["name"]?>"><br><br>
    ที่อยู่ : <br><input name="address" value="<?=$row["address"]?>"></input><br><br>
    เบอร์โทรศัพท์ <input type="tel" name="mobile" value="<?=$row["mobile"]?>"><br><br>
    email : <input type="email" name="email" value="<?=$row["email"]?>"><br><br>
    <input type="submit" value="แก้ไขข้อมูลสมาชิก">
</form>
</body>
</html>