<?php
$login = 'djony';
$pass = 'pass';

$login_form = '';
$pass_form = '';

if (isset($_POST['sendedForm'])) {
    $login_form = $_POST['login'];
    $pass_form = $_POST['password'];

    if (($login_form === $login) && ($pass_form === $pass)) {
        $isAuth = true;
        $_REQUEST['login'] = 'no';;
        $login_form = '';
        $pass_form = '';
    } else {
        $isAuth = false;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/templates/header.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/templates/footer.php');
    ?>
    

</body>
</html>