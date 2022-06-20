<?php

    require_once 'libs/Database/Db.php';

    session_start();

    if(!empty($_SESSION["user"])) {
        header('Location: view/dashboard.php');
    }
    else {
        header('Location: view/login.php');
    }
    