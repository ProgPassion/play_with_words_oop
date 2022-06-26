<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../libs/Database/Db.php';
    require_once '../libs/session.handler.php';
    require_once '../libs/Request.php';
    require_once '../model/login.model.php';

    if(Session::exists("name")) {
        header('Location: view/dashboard.php');
        exit;
    }
    
    $loginModel = new LoginModel($dbparams);
    $username = Request::getRequest("username");
    $password = Request::getRequest("password");
    
    if(empty($username) || empty($password)) {
        Session::set("loginError", "Write username and password to login into your account");
        header("Location: ../view/login.php");
        exit;
    }
    
    $userId = $loginModel->getUserId($username, $password);

    if($userId !== false) {
        Session::set("userId", $userId);
        header("Location: ../view/dashboard.php");
    }
    else{
        Session::set("loginError", "Username or password is incorrect!");
        header("Location: ../view/login.php");
    }


    
?>