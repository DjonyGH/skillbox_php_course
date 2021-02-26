<?php

    require_once 'connect.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $found_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    if ( mysqli_num_rows($found_user) > 0 ) {
        
        $user = mysqli_fetch_assoc($found_user);

        $user_id = $user['id'];

        $_SESSION['user'] = [
            "full_name" => $user['full_name'],
            "email" => $user['email']
        ];

        // $found_user_groups = mysqli_query($connect, "SELECT `name` FROM `user2group`, `groups` WHERE `id_user` = '$user_id' AND `user2group.group_id` = `groups.id` ");

        // $user_groups = mysqli_fetch_assoc($found_user_groups);
        
        // $_SESSION['user'] = [
        //     "groups" => $user_groups['name']
        // ];

        header('Location: profile.php');

    } else {
       $_SESSION['message'] = 'Authorization error';
       header('Location: index.php');
    }