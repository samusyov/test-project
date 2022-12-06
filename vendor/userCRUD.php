<?php

function getUsers()
{
    return json_decode(file_get_contents('../db/file.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user)
    {
        if ($user['id'] == $id)
        {
            return $user;
        }
    }
    return null;
}

function createUser($json_array)
{
    file_put_contents('../db/file.json', json_encode($json_array, JSON_UNESCAPED_UNICODE));
}

function updateUser($json_array, $id)
{
    $users = getUsers();
    foreach ($users as $i => $user)
    {
        if ($user['id'] == $id)
        {
            $users[$i] = array_merge($user, $json_array);
        }
    }
    file_put_contents('../db/file.json', json_encode($users, JSON_UNESCAPED_UNICODE));
}

function deleteUser($id)
{
    $users = getUsers();
    foreach ($users as $i => $user)
    {
        if ($user['id'] == $id)
        {
            array_splice($users, $i, 1);
        }
    }
    file_put_contents('../db/file.json', json_encode($users, JSON_UNESCAPED_UNICODE));
}
