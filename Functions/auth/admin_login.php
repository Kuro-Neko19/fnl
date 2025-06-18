<?php

    session_start();

    require_once realpath('Functions/DB/DataBase.php');

    //Вход
    //$sql = "SELECT * FROM admin_db";
    //$result = mysqli_query($mysql, $sql);
    //while($adm = mysqli_fetch_assoc($result)){
    //    $users_adm_id[$tbl_admin] = trim($adm['id']);
    //    $users_adm_name[$tbl_admin] = trim($adm['name']);
    //    $users_adm_log[$tbl_admin] = trim($adm['login']);
    //    $users_adm_pass[$tbl_admin] = trim($adm['password']);
    //
    //    $tbl_admin = $tbl_admin + 1;
    //}

    
    if(isset($_POST['admn_log_butt'])){
        $login = htmlspecialchars($_POST['admn_inpt_log']);
        $password = htmlspecialchars($_POST['admn_inpt_pass']);

        $auth = 1;
    }

    //Сравнение введённого логина и пароля с БД
    if(isset($auth) && $auth == 1){
        if(isset($login) && isset($password) && isset($users_adm_log)){
            $arr_key = array_search($login, $users_adm_log);

            if($arr_key !== false && sha1($password) == trim($users_adm_pass[$arr_key])){
                $psw = 0;
            }
        }
    }
    
    //Запись данных пользователя в сессионные переменные
    if(isset($auth) && $auth == 1 && isset($psw) && $psw == 0){
        $_SESSION['id'] = $users_adm_id[$arr_key];
        $_SESSION['usr_type'] = 'admin';
        $_SESSION['usr_login'] = $login;
        $_SESSION['usr_name'] = $users_adm_name[$arr_key];
            
        header("Location: https://final.local/profile?id=" . $users_adm_id[$arr_key] . "&type=admin");
    }
?>