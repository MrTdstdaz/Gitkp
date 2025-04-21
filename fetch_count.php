<?php
$pdo = new PDO("mysql:host=localhost;dbname=click_counter;charset=utf8mb4", "root", "");
$stmt = $pdo->query("SELECT count FROM counter WHERE id = 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo $row ? $row['count'] : 0;