<?php
include "connect.php";
session_start();
$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();
if (!empty($row)) {
session_regenerate_id();
$_SESSION["fullname"] = $row["name"];
$_SESSION["username"] = $row["username"];
echo "เข้าสู่ระบบสําเร็จ<br>";
echo "<a href='user-home.php'>ไปยังหน้าหลักของผู้ใช้</a>";
} else {
echo "ไม่สําเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
echo "<a href='login-form.php'>เข้าสู่ระบบอีกครั้ง</a>";
}
?>