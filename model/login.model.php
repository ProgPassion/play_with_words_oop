<?php

    require_once 'main.model.php';
    class LoginModel extends MainModel {

        public function __construct($dbparams) {
            parent::__construct($dbparams);
        }

        public function getUserId($username, $password) {
            return $this->conn->selectOne("id", "users", ["username" => $username, "password" => $password]);
        }
    }