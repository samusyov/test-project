<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=css/style.css>
</head>
<body>
    <div class="container mt-4">
        <h3>Здравствуйте,
        <?php
            if (isset($_SESSION['user_name']))
            {
                echo $_SESSION['user_name'];
            }
            unset($_SESSION['user_name']);
        ?>
        </h3>
        <a id="link" href="signin.php">Выйти</a>
    </div>
</body>
</html>