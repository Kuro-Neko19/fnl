<?php
    session_start();

    require_once realpath('Application/Core/request_protection.php');
    require_once realpath('Functions/DB/DataBase.php');

	$request = new RequestProtection;

    //Регистрация
    if(isset($_POST['adm_reg_butt']) && $request->is_valid()){
        $name = htmlspecialchars($_POST['adm_reg_name']);
        $login = htmlspecialchars($_POST['adm_reg_log']);
        $password = htmlspecialchars($_POST['adm_reg_pass']);
        $password1 = htmlspecialchars($_POST['adm_reg_pass1']);

        $auth = 0;
    }

    if(isset($auth) && $auth == 0){
        $len = strlen($password);
        if($len >= 8 && $len <= 20){
            $ok0 = 0; //пароль требуемой длины
        }
        else($err0 = 0); //пароль не требуемой длины
    }

    if(isset($auth) && $auth == 0 && isset($ok0) && $ok0 == 0){
        if($login != 'null' && $password != 'null' && $password1 != 'null'){
            if($password == $password1){
                $ok1 = 0; //пароли совпадают
            }
            else($err1 = 0); //пароли не совпадают
        }
    }

    if(isset($auth) && $auth == 0 && isset($ok1) && $ok1 == 0){

        $in_pass = sha1($password);

        mysqli_query($mysql, "INSERT INTO admin_db (name, login, password) VALUES ('$name', '$login', '$in_pass')");
        
        header("Location: https://final.local/admin");
    }
?>