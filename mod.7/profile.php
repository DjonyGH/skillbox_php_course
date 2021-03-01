<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit;
    }
?> 
<pre>
    <?php var_dump($_SESSION['user']); ?>
</pre> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>PHP - Module 7</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

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
                    foreach ($_SESSION['user']['sent_messages'] as $sent_messages) {
                        echo '<p>'.$sent_messages['date'].': '.$sent_messages['text'].' [to: '.$sent_messages['to_user'].']</p>';
                    };
                ?>
            </div>

            <div class="received">
                <h3>Received</h3>
                <?php
                    foreach ($_SESSION['user']['received_messages'] as $received_messages) {
                        echo '<p>'.$received_messages['date'].': '.$received_messages['text'].' [from: '.$received_messages['from_user'].']</p>';
                    };
                ?>
            </div>

        </div>
    </div>

    
    
</body>
</html>