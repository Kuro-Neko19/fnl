<?php
    session_start();
    
    require_once realpath('Functions/DB/DataBase.php');
    
    ini_set('display_errors', 0);

    //Регистрация
    if(isset($_POST['mstr_reg_butt'])){
        $name = htmlspecialchars($_POST['mstr_reg_name']);
        $login = htmlspecialchars($_POST['mstr_reg_log']);
        $password = htmlspecialchars($_POST['mstr_reg_pass']);
        $password1 = htmlspecialchars($_POST['mstr_reg_pass1']);

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

        mysqli_query($mysql, "INSERT INTO master_db (name, login, password) VALUES ('$name', '$login', '$in_pass')");
        
        $_SESSION['usr_type'] = 'master';
        $_SESSION['usr_login'] = $login;
        $_SESSION['usr_name'] = $name;


        $sql = "SELECT * FROM master_db";
        $result = mysqli_query($mysql, $sql);
        while($usrs = mysqli_fetch_assoc($result)){
            $usersid[$a] = trim($usrs['id']);
            $userslog[$a] = trim($usrs['login']);

            $a = $a + 1;
        }

        $arr_key = array_search($login, $userslog);
        $_SESSION['id'] = $usersid[$arr_key];

        header("Location: https://final.local/profile?id=" . $usersid[$arr_key] . "&type=master");
    }

    //Вход

    //$sql = "SELECT * FROM master_db";
    //$result = mysqli_query($mysql, $sql);
    //while($mstr = mysqli_fetch_assoc($result)){
    //    $users_m_id[$tbl_master] = trim($mstr['id']);
    //    $users_m_name[$tbl_master] = trim($mstr['name']);
    //    $users_m_login[$tbl_master] = trim($mstr['login']);
    //    $users_m_password[$tbl_master] = trim($mstr['password']);
    //    if($mstr['offers'] !== null){
    //        $users_m_offers[$tbl_master] = trim($mstr['offers']);
    //    }
    //    else $users_m_offers[$tbl_master] = $mstr['offers'];
    //
    //    $tbl_master = $tbl_master + 1;
    //}

    if(isset($_POST['mstr_log_butt'])){
        $login = htmlspecialchars($_POST['mstr_inpt_log']);
        $password = htmlspecialchars($_POST['mstr_inpt_pass']);

        $auth = 1;
    }

    //Сравнение введённого логина и пароля с БД
    if(isset($auth) && $auth == 1){
        if(isset($login) && isset($password) && isset($users_m_login)){
            $arr_key = array_search($login, $users_m_login);

            if($arr_key !== false && sha1($password) == trim($users_m_password[$arr_key])){
                $psw = 0;
            }
        }
    }
    
    //Запись данных пользователя в сессионные переменные
    if(isset($auth) && $auth == 1 && isset($psw) && $psw == 0){
        
        if($users_m_block[$arr_key] !== null){
            $_SESSION['block'] = 1;
        }

        $_SESSION['id'] = $users_m_id[$arr_key];
        $_SESSION['usr_type'] = 'master';
        $_SESSION['usr_login'] = $login;
        $_SESSION['usr_name'] = $users_m_name[$arr_key];
            
        header("Location: https://final.local/profile?id=" . $users_m_id[$arr_key] . "&type=master");
    }
