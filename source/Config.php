<?php
const URL_BASE = "http://localhost/products_and_suppliers";
const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "4306",
    "dbname" => "nio",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];
