<?php
    require_once 'templates/header.php';

    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
        exit;
    } 
    
    if (isset($_SESSION['message'])) {

    }
    
?>

    <form action="includes/signin.php" method="POST">
        <h1 class="title">Authorization</h1>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password">
        <div class="controls">
            <button type="submit">Send</button>
        </div>
        <div class="message_error">
        <?php        
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            };        
        ?>
        </div>        
    </form>
    
<?php    
    require_once 'templates/footer.php';
?>