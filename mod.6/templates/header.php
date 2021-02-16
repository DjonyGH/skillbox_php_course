<?php
session_start();

$login = 'djony';
$pass = 'pass';
$login_form = $_COOKIE['login'] ? $_COOKIE['login'] : '';
$pass_form = '';

if (isset($_POST['sendedForm'])) {
    $login_form = $_POST['login'];
    $pass_form = $_POST['password'];

    if (($login_form === $login) && ($pass_form === $pass)) {
        $_SESSION['isAuth'] = true;
        $_REQUEST['login'] = 'no';
        $login_form = $_COOKIE['login'] ? $_COOKIE['login'] : '';
        $pass_form = '';        
    } else {
        $_SESSION['isAuth'] = false;
    }
};

if($_GET['logout'] === 'yes') {
    unset($_SESSION['isAuth']);
    unset($_COOKIE['login']);
    setcookie('login', null, -1);
    header('Location: /');
    exit;
}

if ($_SESSION['isAuth']===true) {
    if (!$_COOKIE['login']) {
        setcookie("login", $login, time()+3600);  
    }    
}



include($_SERVER['DOCUMENT_ROOT'] . '/main_menu.php');
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <script src="/scripts/main.js" defer></script>
</head>

<body>
    <div class="header">
        <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="navbar">
            <?php showMenu($menu) ?>
            <?php 
            if ($_SESSION['isAuth'] === false || $_SESSION['isAuth'] === NULL) { ?>
                <button class="navbar__btn" id="auth-btn">Авторизоваться</button>
            <?php 
            } else {?>
                <button class="navbar__btn"  id="logout-btn">Выйти</button>
            <?php }?>
            
            
        </div>
        
    </div>


    


	