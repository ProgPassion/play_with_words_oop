<?php

    require_once 'libs/Database/Db.php';
    require_once 'libs/session.handler.php';

    session_start();

    if(Session::exists("name")) {
        header('Location: view/dashboard.php');
    }
    else {
        header('Location: view/login.php');
    }
    