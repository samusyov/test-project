<?php

require __DIR__ . "/userCRUD.php";

$file_name = '../db/file.json';

if (file_exists($file_name)) {
    $current_data = file_get_contents($file_name);
    $json_array = json_decode($current_data, true);
    registerUser($file_name, $json_array);
} else {
    $file = fopen($file_name, "w");
    $json_array = array();
    registerUser($file_name, $json_array);
    fclose($file);
}

function registerUser($file_name, $json_array)
{
    if (checkUniqueData('login') != 'login') {
        if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
            if (filter_var(trim($_POST['password'])) == filter_var(trim($_POST['confirm_password']))) {
                if (checkUniqueData('email') != 'email') {
                    $arr = json_decode(file_get_contents($file_name), true);
                    $user = new User(count(is_countable($arr) ? $arr : []) + 1,
                        filter_var(trim($_POST['login'])),
                        md5(filter_var(trim($_POST['password']))),
                        filter_var(trim($_POST['email'])),
                        filter_var(trim($_POST['name'])));
                    createUser($user, $json_array);
                    echo json_encode(array('msg' => 'no_error'));
                } else {
                    echo json_encode(array('msg' => 'email_error'));
                }
            } else {
                echo json_encode(array('msg' => 'confirm_password_error'));
            }
        }
    } else {
        echo json_encode(array('msg' => 'login_error'));
    }
}

function checkUniqueData($uniqueData)
{
    $json_arr = json_decode(file_get_contents('../db/file.json'), true);
    if (is_array($json_arr) || is_object($json_arr)) {
        foreach ($json_arr as $one) {
            if (isset($_POST[$uniqueData])) {
                if ($one[$uniqueData] == filter_var(trim($_POST[$uniqueData]))) {
                    return $uniqueData;
                }
            }
        }
    }
    return null;
}