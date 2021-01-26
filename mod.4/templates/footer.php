
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
        
            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/success.php'; ?>
        
        </td>
        <?php if (($_GET['login'] === 'yes') || $isAuth === false) {?>
        <td class="right-collum-index">
            
            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            
            <div class="index-auth">
                <form action="index.php" method="POST">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="login_id">Ваш e-mail:</label>
                                <input id="login_id" size="30" name="login" value='<?= $login_form;?>'>
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id">Ваш пароль:</label>
                                <input id="password_id" size="30" name="password" type="password" value='<?= $pass_form;?>'>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Войти" name="sendedForm"></td>
                        </tr>
                    </table>
                </form>
            </div>
        
        </td>
        <?php }?>
    </tr>
</table>

<div class="clearfix">
    <ul class="main-menu bottom">
        <li><a href="#">Главная</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Каталог</a></li>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr>2018</nobr> Project.</div>

