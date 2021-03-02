<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $found_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    if ( mysqli_num_rows($found_user) > 0 ) {
        
        $user = mysqli_fetch_assoc($found_user);
        // var_dump($user);

        $user_id = $user['id'];

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['fio'],
            "email" => $user['email'],
            "phone" => $user['phone']
        ];

        $found_user_groups = mysqli_query($connect, " SELECT `groups`.`name` FROM `groups` JOIN `user_group` ON `user_group`.`group_id` = `groups`.`id` WHERE `user_id` = '$user_id' ");

        if ( mysqli_num_rows($found_user_groups) > 0 ) {

            $user_groups = [];

            while ($row = mysqli_fetch_assoc($found_user_groups)) {
                $user_groups[] = $row['name'];
            }
        
            $_SESSION['user'] += [
                "groups" => $user_groups
            ];

        } else {
            $user_groups = [];
        }

        header('Location: ../profile.php');
        exit;       
        
    } else {
        $_SESSION['message'] = 'authorization error';
        header('Location: ../index.php');
        exit;
    }