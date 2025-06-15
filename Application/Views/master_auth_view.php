<?php
    session_start();

    require_once realpath('Functions/auth/master_auth.php');
?>
<!-- -->
<p>Авторизация в качестве веб-мастера</p>
<div>
    <form method="post">

        <div>
            <p>Логин:<input type="login" name="mstr_inpt_log"></p><!--Логин-->
            <p>Пароль:<input type="password" name="mstr_inpt_pass"></p><!--Пароль-->
            <input type="submit" value="Войти" name="mstr_log_butt"><!--Войти-->
        </div>

        <div>
            <p>Имя:<input type="text" name="mstr_reg_name"></p><!--Имя-->
            <p>Логин:<input type="login" name="mstr_reg_log"></p><!--Логин-->
            <p>Пароль:<input type="password" name="mstr_reg_pass"></p><!--Пароль-->
            <p>Повторите пароль:<input type="password" name="mstr_reg_pass1"></p><!--Повторить пароль-->
            <input type="submit" value="Регистрация" name="mstr_reg_butt"><!--Регистрация-->
        </div>

    </form>
</div>