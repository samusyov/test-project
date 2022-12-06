<?php

require __DIR__ . "/User.php";

function getUsers()
{
    return json_decode(file_get_contents('../db/file.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser(User $user, $json_array)
{
    $new_data = array(
        'id' => $user->getId(),
        'login' => $user->getLogin(),
        'password' => $user->getPassword(),
        'email' => $user->getEmail(),
        'name' => $user->getName()
    );
    $json_array[] = $new_data;
    file_put_contents('../db/file.json', json_encode($json_array, JSON_UNESCAPED_UNICODE));
}

function updateUser($json_array, $id)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = array_merge($user, $json_array);
        }
    }
    file_put_contents('../db/file.json', json_encode($users, JSON_UNESCAPED_UNICODE));
}

function deleteUser($id)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }
    file_put_contents('../db/file.json', json_encode($users, JSON_UNESCAPED_UNICODE));
}

function getUserByLoginAndPassword(User $user): string
{
    $users = json_decode(file_get_contents('../db/file.json'), true);
    if (is_array($users) || is_object($users)) {
        foreach ($users as $u) {
            if ($u['login'] == $user->getLogin()) {
                if ($u['password'] == $user->getPassword()) {
                    return $u['name'];
                } else {
                    return 'wrong-password';
                }
            }
        }
    }
    return 'wrong-login';
}
