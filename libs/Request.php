<?php

    class Request {

        public static function getRequest($param) {
            return $_REQUEST[$param] ?? "";
        }
    }
