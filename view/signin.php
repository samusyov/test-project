<?php
    session_start();
    unset($_SESSION["user_login"]);
    unset($_SESSION["user_name"]);
    $_SESSION["is_auth"] = false;
    //session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=css/style.css>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/sendForm.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Авторизация</h1>
        <form action="/vendor/auth.php" method="post">
            <label for="login"></label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" minlength="6" maxlength="16" required>
            <div class="wrong-login"></div>
            <label for="password"></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" minlength="6" maxlength="16" required>
            <div class="wrong-password"></div>
            <button class="btn btn-success mt-4" id="sign_in_submit" type="submit">Войти</button>
            <p class="mt-4">
                У Вас ещё нет аккаунта? - <a href="signup.php">Зарегистрируйтесь!</a>
            </p>
        </form>
    </div>
</body>
</html>