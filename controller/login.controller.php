<?php

    require_once '../libs/Database/Db.php';
    require_once '../libs/session.handler.php';

    session_start();
    
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {

        $conn = Db::init($dbparams);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userId = $conn->selectOne("id", "users", ["username" => $username, "password" => $password]);

        if($userId !== false) {
            Session::set("userId", $userId);
            header("Location: ../view/dashboard.php");
        }
        else{
            Session::set("loginError", "Username or password is incorrect!");
            header("Location: ../view/login.php");
        }
    }
    else {
        Session::set("loginError", "Write username and password to login into your account");
        header("Location: ../view/login.php");
    }
?>