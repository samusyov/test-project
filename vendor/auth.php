<?php

session_start();

if (file_exists('C:\xampp\htdocs\test-project\db\file.json'))
{
    if (isset($_POST['login']) && isset($_POST['password']))
    {
        echo json_encode(AuthLoginAndPass(filter_var(trim($_POST['login'])), md5(filter_var(trim($_POST['password'])))));
    }
}
else
{
    $_SESSION["is_auth"] = false;
    echo json_encode(array('errorType' => 'wrong-login'));
}

function AuthLoginAndPass($login, $password): array
{
    $json_arr = json_decode(file_get_contents('C:\xampp\htdocs\test-project\db\file.json'), true);
    if (is_array($json_arr) || is_object($json_arr))
    {
        foreach ($json_arr as $one)
        {
            if ($one['login'] == $login)
            {
                if ($one['password'] == $password)
                {
                    $_SESSION["is_auth"] = true;
                    $_SESSION["user_login"] = $one['login'];
                    $_SESSION['user_name'] = $one['name'];
                    setcookie('user_login', $one['login'], time() + (86400 * 30), "/");
                    return array('errorType' => $one['name']);
                }
                else
                {
                    $_SESSION["is_auth"] = false;
                    return array('errorType' => 'wrong-password');
                }
            }
        }
    }
    $_SESSION["is_auth"] = false;
    return array('errorType' => 'wrong-login');
}