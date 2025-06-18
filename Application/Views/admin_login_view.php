<?php
    session_start();

require realpath('vendor/autoload.php');

spl_autoload_extensions(".php");
spl_autoload_register();

    $connect = new Auth\AdminLogin;
    $connect->connectAdmin();

    //require_once realpath('Functions/auth/admin_login.php');

?>
<!-- -->
 <p>Войти как администратор</p>
<div>
    <form method="post">

        <div>
            <p>Логин:<input type="login" name="admn_inpt_log"></p><!--Логин-->
            <p>Пароль:<input type="password" name="admn_inpt_pass"></p><!--Пароль-->
            <input type="submit" value="Войти" name="admn_log_butt"><!--Войти-->
        </div>

    </form>
</div>