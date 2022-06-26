<?php

    class MainModel {

        protected $conn;

        protected function __construct($dbparams) {
            $this->conn = Db::init($dbparams);    
        }
    }