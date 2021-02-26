<?php
    session_start();
?>

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

    <form action="includes/signin.php" method="POST">
        <h1 class="title">Authorization</h1>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password">
        <div class="controls">
            <button type="submit">Send</button>
        </div>        
    </form>
    
</body>
</html>