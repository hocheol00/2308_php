<?php
function my_db_conn(&$conn) {
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "php504";
    $db_name = "employees";
    $db_charset = "utf8mb4";
    $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    $db_options = [
        PDO::ATTR_EMULATE_PREPARES => false
        ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}