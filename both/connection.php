<?php
$host = "localhost";
$dbname = "schoollist";
$user = "root";      // اگه روی لوکال هستی معمولاً root
$pass = "";          // اگه XAMPP/MAMP هستی پسورد نداره

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("اتصال به دیتابیس شکست خورد: " . $e->getMessage());
}
?>