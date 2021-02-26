<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db_name = '';

    $connect = mysqly_connect($host, $user, $pass, $db_name);

    if (!$connect) {
        die('Error connect to DataBase');
    }