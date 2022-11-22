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
</head>
<body>
<div class="container mt-4">
    <h1>Регистрация</h1>
    <form action="/vendor/register.php" method="post">
        <label for="login"></label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" minlength="6" maxlength="16" required>
        <div class="login-error"></div>
        <label for="password"></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" minlength="6" maxlength="16" pattern="[A-Za-z0-9]+" required>
        <label for="confirm_password"></label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Подтвердите пароль" onchange="checkPasswordMatch()" required>
        <div class="confirm-password-error"></div>
        <label for="email"></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Введите email" required>
        <div class="email-error"></div>
        <label for="name"></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" minlength="2" maxlength="64" pattern="[A-ЯЁ][а-яё]+" required>
        <button class="btn btn-success mt-4" id="sign_up_submit" type="submit">Зарегистрироваться</button>
        <p class="mt-4">
            У Вас уже есть аккаунт? - <a href="signin.php">Авторизуйтесь!</a>
        </p>
    </form>
</div>
</body>
</html>