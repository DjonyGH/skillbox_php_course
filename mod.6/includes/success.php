<?php
if (isset($_POST['sendedForm'])) {
  if ($_SESSION['isAuth'] === true) {
    ?> <p style="color: green">Вы успешно авторизованны!</p> <?php
  } else {
    ?> <p style="color: red">Логин или пароль введены не верно!</p> <?php
  }  
} 