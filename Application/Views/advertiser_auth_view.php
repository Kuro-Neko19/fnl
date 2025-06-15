<?php
    session_start();

    require_once realpath('Functions/auth/advertiser_auth.php');
?>
<!-- -->
<p>Авторизация в качестве рекламодателя</p>
<div>
    <form method="post">

        <div>
            <p>Логин:<input type="login" name="adv_inpt_log"></p><!--Логин-->
            <p>Пароль:<input type="password" name="adv_inpt_pass"></p><!--Пароль-->
            <input type="submit" value="Войти" name="adv_log_butt"><!--Войти-->
        </div>

        <div>
            <p>Имя:<input type="text" name="adv_reg_name"></p><!--Имя-->
            <p>Логин:<input type="login" name="adv_reg_log"></p><!--Логин-->
            <p>Пароль:<input type="password" name="adv_reg_pass"></p><!--Пароль-->
            <p>Повторите пароль:<input type="password" name="adv_reg_pass1"></p><!--Повторить пароль-->
            <input type="submit" value="Регистрация" name="adv_reg_butt"><!--Регистрация-->
        </div>

    </form>
</div>