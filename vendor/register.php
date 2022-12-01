<?php

$file_name = '../db/file.json';

if (file_exists($file_name))
{
    $current_data = file_get_contents($file_name);
    $json_array = json_decode($current_data, true);
    writeData($file_name, $json_array);
}
else
{
    $file = fopen($file_name,"w");
    $json_array = array();
    writeData($file_name, $json_array);
    fclose($file);
}

function writeData($file_name, $json_array)
{
    if (checkUniqueData('login') != 'login')
    {
        if (isset($_POST['password']) && isset($_POST['confirm_password']))
        {
            if (filter_var(trim($_POST['password'])) == filter_var(trim($_POST['confirm_password'])))
            {
                if (checkUniqueData('email') != 'email')
                {
                    $new_data = array(
                        'login' => filter_var(trim($_POST['login'])),
                        'password' => md5(filter_var(trim($_POST['password']))),
                        'email' => filter_var(trim($_POST['email'])),
                        'name' => filter_var(trim($_POST['name']))
                    );
                    $json_array[] = $new_data;
                    file_put_contents($file_name, json_encode($json_array, JSON_UNESCAPED_UNICODE));
                    echo json_encode(array('errorType' => 'no-error'));
                }
                else
                {
                    echo json_encode(array('errorType' => 'email-error'));
                }
            }
            else
            {
                echo json_encode(array('errorType' => 'confirm-password-error'));
            }
        }

    }
    else
    {
        echo json_encode(array('errorType' => 'login-error'));
    }
}

function checkUniqueData($uniqueData) {
    $json_arr = json_decode(file_get_contents('../db/file.json'), true);
    if (is_array($json_arr) || is_object($json_arr))
    {
        foreach ($json_arr as $one)
        {
            if (isset($_POST[$uniqueData]))
            {
                if ($one[$uniqueData] == filter_var(trim($_POST[$uniqueData])))
                {
                    return $uniqueData;
                }
            }
        }
    }
    return null;
}