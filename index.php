<?php
session_start();
$clicked = isset($_SESSION['clicked']) ? true : false;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عداد الضغط - PHP</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f9f9f9;
        }
        #count {
            font-size: 50px;
            color: green;
        }
        button {
            font-size: 20px;
            margin: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

    <h1>العداد:</h1>
    <div id="count">0</div>

    <?php if (!$clicked): ?>
        <form method="post" action="process.php">
            <input type="email" name="email" required placeholder="أدخل بريدك الإلكتروني">
            <br><br>
            <button type="submit">اضغط هنا</button>
        </form>
    <?php else: ?>
        <p>لقد ضغطت مسبقًا!</p>
        <p><strong><?= htmlspecialchars($email) ?></strong></p>
    <?php endif; ?>

    <script>
        function updateCount() {
            fetch("fetch_count.php")
                .then(res => res.text())
                .then(count => {
                    document.getElementById("count").textContent = count;
                });
        }

        setInterval(updateCount, 2000); // كل ثانيتين
        updateCount(); // أول تحميل
    </script>

</body>
</html>