<?php
    require_once 'templates/header.php';
    require_once 'includes/connect.php';

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit;
    }

    $user_id = $_SESSION['user']['id'];

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
?> 
<!-- <pre>
    <?php var_dump($_SESSION['user']); ?>
</pre>  -->

    <div class="profile">
        <h1>Hello, <?= $_SESSION['user']['full_name'] ?></h1>
        <a href="includes/logout.php">[ Exit ]</a>
        <p>Email: <?= $_SESSION['user']['email'] ?></p>
        <p>Phone: <?= $_SESSION['user']['phone'] ?></p>
        <p>Privelegions: 
            <?php
                foreach ($_SESSION['user']['groups'] as $group) {
                    echo $group.' ';
                };
            ?>
        </p>

        <h2>Messages</h2>        
        <div class="messages">

            <div class="sent">
                <h3>Sent</h3>
                <?php
                if ($_SESSION['user']['sent_messages']) {
                    foreach ($_SESSION['user']['sent_messages'] as $sent_messages) {
                        echo '<p>'.$sent_messages['date'].': '.$sent_messages['text'].' [to: '.$sent_messages['to_user'].']</p>';
                    };
                } else {
                    echo '<p>None messages</p>';
                }
                    
                ?>
            </div>

            <div class="received">
                <h3>Received</h3>
                <?php
                if ($_SESSION['user']['received_messages']) {
                    foreach ($_SESSION['user']['received_messages'] as $received_messages) {
                        echo '<p>'.$received_messages['date'].': '.$received_messages['text'].' [from: '.$received_messages['from_user'].']</p>';
                    };
                } else {
                    echo '<p>None messages</p>'; 
                }
                    
                ?>
            </div>

        </div>
    </div>
    
<?php    
    require_once 'templates/footer.php';
?>