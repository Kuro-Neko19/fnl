<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }

    require_once realpath('Functions/auth/adm_master_reg.php');
    require_once realpath('Application/Core/request_protection.php');

	$request = new RequestProtection;
?>
<!-- -->
<p>Регистрация веб-мастера</p>
<div>
    <form method="post">

        <div>
            <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
            <p>Имя:<input type="text" name="mstr_reg_name"></p><!--Имя-->
            <p>Логин:<input type="login" name="mstr_reg_log"></p><!--Логин-->
            <p>Пароль:<input type="password" name="mstr_reg_pass"></p><!--Пароль-->
            <p>Повторите пароль:<input type="password" name="mstr_reg_pass1"></p><!--Повторить пароль-->
            <input type="submit" value="Регистрация" name="mstr_reg_butt"><!--Регистрация-->
        </div>

    </form>
</div>