<?php

    $host = 'localhost:3306';
    $user = 'root';
    $pass = 'root';
    $db_name = 'mod7_db';

    $connect = mysqli_connect($host, $user, $pass, $db_name);

    if (!$connect) {
        die('Error connect to DataBase');
    }