<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = strtolower(trim($_POST['email']));
    $pdo = new PDO("mysql:host=localhost;dbname=click_counter;charset=utf8mb4", "root", "");

    // تحقق هل ضغط من قبل
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() === 0) {
        // أضف الإيميل
        $insert = $pdo->prepare("INSERT INTO users (email) VALUES (?)");
        $insert->execute([$email]);

        // زد العداد
        $update = $pdo->prepare("UPDATE counter SET count = count + 1 WHERE id = 1");
        $update->execute();

        $_SESSION['clicked'] = true;
        $_SESSION['email'] = $email;
    }
}
header("Location: index.php");
exit;