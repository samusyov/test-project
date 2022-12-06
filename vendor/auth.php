<?php

require __DIR__ . '/userCRUD.php';

session_start();

if (file_exists('../db/file.json')) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        echo json_encode(AuthLoginAndPass(filter_var(trim($_POST['login'])), md5(filter_var(trim($_POST['password'])))));
    }
} else {
    $_SESSION["is_auth"] = false;
    echo json_encode(array('errorType' => 'wrong-login'));
}

function AuthLoginAndPass($login, $password): array
{
    $user = new User(-1, $login, $password, "", "");
    $result = getUserByLoginAndPassword($user);
    if ($result != 'wrong-login') {
        if ($result != 'wrong-password') {
            $_SESSION['is_auth'] = true;
            $_SESSION['user_login'] = $user->getLogin();
            $_SESSION['user_name'] = $result;
            setcookie('user_login', $user->getLogin(), time() + (86400 * 30), "/");
            return array('errorType' => 'no-error');
        } else {
            $_SESSION['is_auth'] = false;
            return array('errorType' => 'wrong-password');
        }
    } else {
        $_SESSION['is_auth'] = false;
        return array('errorType' => 'wrong-login');
    }
}