<?php
session_start();
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
    <noscript>
        <link rel="stylesheet" href="css/noscript-style.css">
    </noscript>
</head>

<body>
<?php
if (!isset($_SESSION["is_auth"]) || !$_SESSION["is_auth"]) {
    echo
    '<div class="container mt-4">
            <h1>Авторизация</h1>
            <form action="/vendor/authorize.php" method="post">
                <label for="login"></label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" minlength="6" maxlength="16" required>
                <div class="error-field" id="wrong_login"></div>
                <label for="password"></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" minlength="6" maxlength="16" required>
                <div class="error-field" id="wrong_password"></div>
                <button class="btn btn-success mt-4" type="submit">Войти</button>
                <div id="noscript_error"></div>
                <p class="mt-4">
                    У Вас ещё нет аккаунта? - <a href="signup.php">Зарегистрируйтесь!</a>
                </p>
            </form>
        </div>
        ';
} else {
    echo
    '<div class="container mt-4">
            <h3>Здравствуйте,
            ';
    if (isset($_SESSION['user_name'])) {
        echo $_SESSION['user_name'];
    }
    echo
    '</h3>
            <form action="/vendor/exit.php" method="post">
                <button class="btn btn-success mt-4" type="submit">Выйти</button>
            </form>
        </div>
        ';
}
?>
</body>

</html>
