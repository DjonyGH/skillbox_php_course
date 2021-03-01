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

        $found_user_sent_messages = mysqli_query($connect, " SELECT `messages`.* FROM `messages` JOIN `message_users` ON `message_users`.`message_id` = `messages`.`id` WHERE `user_sender_id` = '$user_id' ");
        if ( mysqli_num_rows($found_user_sent_messages) > 0 ) {
            $user_sent_messages = [];            

            while ($row = mysqli_fetch_assoc($found_user_sent_messages)) {
                $user_sent_messages[] = $row;
            }
        
            $_SESSION['user'] += [
                "sent_messages" => $user_sent_messages
            ];

            $_SESSION['user']['sent_messages'] = array_map(function ($sent_message) use($connect) {
                $sent_message_id = $sent_message['id'];
                $found_user_to_sent_message = mysqli_query($connect, " SELECT `users`.`fio` FROM `users` JOIN `message_users` ON `message_users`.`user_recipient_id` = `users`.`id` WHERE `message_id` = '$sent_message_id' ");
                $to_user = mysqli_fetch_assoc($found_user_to_sent_message); 
                $sent_message += [
                    "to_user" => $to_user['fio']
                ];
                return $sent_message;
            }, $_SESSION['user']['sent_messages']);

        } else {
            $user_sent_messages = [];
        }

        $found_user_received_messages = mysqli_query($connect, " SELECT `messages`.* FROM `messages` JOIN `message_users` ON `message_users`.`message_id` = `messages`.`id` WHERE `user_recipient_id` = '$user_id' ");
        if ( mysqli_num_rows($found_user_received_messages) > 0 ) {
            $user_received_messages = [];

            while ($row = mysqli_fetch_assoc($found_user_received_messages)) {
                $user_received_messages[] = $row;
            }
        
            $_SESSION['user'] += [
                "received_messages" => $user_received_messages
            ];
            
            $_SESSION['user']['received_messages'] = array_map(function ($received_message) use($connect) {
                $received_message_id = $received_message['id'];
                $found_user_from_received_message = mysqli_query($connect, " SELECT `users`.`fio` FROM `users` JOIN `message_users` ON `message_users`.`user_sender_id` = `users`.`id` WHERE `message_id` = '$received_message_id' ");
                $from_user = mysqli_fetch_assoc($found_user_from_received_message); 
                $received_message += [
                    "from_user" => $from_user['fio']
                ];
                return $received_message;
            }, $_SESSION['user']['received_messages']);

        } else {
            $user_received_messages = [];
        }

        header('Location: ../profile.php');
        exit;       
        
    } else {
       $_SESSION['message'] = 'Authorization error';
       die('Authorization error');
    }