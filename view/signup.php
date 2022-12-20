<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=css/style.css>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/checkPassword.js"></script>
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
        <h1>Регистрация</h1>
        <form action="/vendor/register.php" method="post">
            <label for="login"></label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" minlength="6" maxlength="16" pattern="^\S*$" required>
            <div class="error-field" id="login_error"></div>
            <label for="password"></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" minlength="6" maxlength="16" pattern="^(([a-z]+\d+)|(\d+[a-z]+))[a-z\d]*$" required>
            <label for="confirm_password"></label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Подтвердите пароль" onchange="checkPasswordMatch()" required>
            <div class="error-field" id="confirm_password_error"></div>
            <label for="email"></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Введите email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required>
            <div class="error-field" id="email_error"></div>
            <label for="name"></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" minlength="2" maxlength="64" pattern="^[A-ЯЁ][а-яё]+|[A-Z][a-z]+$" required>
            <button class="btn btn-success mt-4" id="sign_up_submit" type="submit">Зарегистрироваться</button>
            <div id="noscript_error"></div>
            <p class="mt-4">
                У Вас уже есть аккаунт? - <a href="signin.php">Авторизуйтесь!</a>
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