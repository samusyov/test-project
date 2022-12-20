<?php
session_start();
unset($_SESSION["user_login"]);
unset($_SESSION["user_name"]);
$_SESSION["is_auth"] = false;
echo json_encode(array('msg' => 'exit'));