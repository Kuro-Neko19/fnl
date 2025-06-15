<?php
    session_start();
    
    require_once realpath('Functions/DB/DataBase.php');

    ini_set('display_errors', 0);

    //Регистрация
    if(isset($_POST['adv_reg_butt'])){
        $name = htmlspecialchars($_POST['adv_reg_name']);
        $login = htmlspecialchars($_POST['adv_reg_log']);
        $password = htmlspecialchars($_POST['adv_reg_pass']);
        $password1 = htmlspecialchars($_POST['adv_reg_pass1']);

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

        mysqli_query($mysql, "INSERT INTO advertiser_db (name, login, password) VALUES ('$name', '$login', '$in_pass')");
        
        $_SESSION['usr_type'] = 'advertiser';
        $_SESSION['usr_login'] = $login;
        $_SESSION['usr_name'] = $name;

        $sql = "SELECT * FROM advertiser_db";
        $result = mysqli_query($mysql, $sql);
        while($usrs = mysqli_fetch_assoc($result)){
            $usersid[$a] = trim($usrs['id']);
            $userslog[$a] = trim($usrs['login']);

            $a = $a + 1;
        }

        $arr_key = array_search($login, $userslog);
        $_SESSION['id'] = $usersid[$arr_key];

        header("Location: https://final.local/profile?id=" . $usersid[$arr_key] . "&type=advertiser");
    }

    //Вход

    //$sql = "SELECT * FROM advertiser_db";
    //$result = mysqli_query($mysql, $sql);
    //while($adv = mysqli_fetch_assoc($result)){
    //    $users_a_id[$tbl_adv] = trim($adv['id']);
    //    $users_a_name[$tbl_adv] = trim($adv['name']);
    //    $users_a_log[$tbl_adv] = trim($adv['login']);
    //    $users_a_pass[$tbl_adv] = trim($adv['password']);
    //
    //    $tbl_adv = $tbl_adv + 1;
    //}
    
    if(isset($_POST['adv_log_butt'])){
        $login = htmlspecialchars($_POST['adv_inpt_log']);
        $password = htmlspecialchars($_POST['adv_inpt_pass']);

        $auth = 1;
    }

    //Сравнение введённого логина и пароля с БД
    if(isset($auth) && $auth == 1){
        if(isset($login) && isset($password) && isset($users_a_log)){
            $arr_key = array_search($login, $users_a_log);

            if($arr_key !== false && sha1($password) == trim($users_a_pass[$arr_key])){
                $psw = 0;
            }
        }
    }
    
    //Запись данных пользователя в сессионные переменные
    if(isset($auth) && $auth == 1 && isset($psw) && $psw == 0){

        $_SESSION['id'] = $users_a_id[$arr_key];
        $_SESSION['usr_type'] = 'advertiser';
        $_SESSION['usr_login'] = $login;
        $_SESSION['usr_name'] = $users_a_name[$arr_key];
            
        header("Location: https://final.local/profile?id=" . $users_a_id[$arr_key] . "&type=advertiser");
    }
?>