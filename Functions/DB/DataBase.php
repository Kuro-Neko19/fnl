<?php

    session_start();

    $tbl_offr = 0;
    $tbl_admin = 0;
    $tbl_adv = 0;
    $tbl_master = 0;
    $tbl_log = 0;

    //Подключение к БД
    global $mysql;
    $mysql = mysqli_connect('MySQL-8.2', 'root', '', 'Project_DB');
        if (mysqli_connect_errno()){
            echo 'Не удалось подключится к базе данных';
            exit();
        }
    
    //Извлечение таблицы офферов
    $sql = "SELECT * FROM offers_db";
    $result = mysqli_query($mysql, $sql);
    while($offr = mysqli_fetch_assoc($result)){
        $offerid[$tbl_offr] = trim($offr['offer_id']);
        $offername[$tbl_offr] = trim($offr['offer_name']);
        $offerabout[$tbl_offr] = trim($offr['offer_about']);
        $offerprice[$tbl_offr] = trim($offr['price']);
        $offerown[$tbl_offr] = trim($offr['own']);
        $offerurl[$tbl_offr] = trim($offr['url']);
        if($offr['subscriptions'] !== null){
            $offersub[$tbl_offr] = trim($offr['subscriptions']);
        }
        else $offersub[$tbl_offr] = $offr['subscriptions'];

        $tbl_offr = $tbl_offr + 1;
    }
    global $offerid;

    //Извлечение таблицы админов
    $sql = "SELECT * FROM admin_db";
    $result = mysqli_query($mysql, $sql);
    while($adm = mysqli_fetch_assoc($result)){
        $users_adm_id[$tbl_admin] = trim($adm['id']);
        $users_adm_name[$tbl_admin] = trim($adm['name']);
        $users_adm_log[$tbl_admin] = trim($adm['login']);
        $users_adm_pass[$tbl_admin] = trim($adm['password']);

        $tbl_admin = $tbl_admin + 1;
    }

    //Извлечение таблицы рекламодателей
    $sql = "SELECT * FROM advertiser_db";
    $result = mysqli_query($mysql, $sql);
    while($adv = mysqli_fetch_assoc($result)){
        $users_a_id[$tbl_adv] = trim($adv['id']);
        $users_a_name[$tbl_adv] = trim($adv['name']);
        $users_a_log[$tbl_adv] = trim($adv['login']);
        $users_a_pass[$tbl_adv] = trim($adv['password']);
        if($adv['block'] !== null){
            $users_a_block[$tbl_master] = trim($adv['block']);
        }
        else $users_a_block[$tbl_master] = $adv['block'];

        $tbl_adv = $tbl_adv + 1;
    }

    //Извлечение таблицы веб-мастеров
    $sql = "SELECT * FROM master_db";
    $result = mysqli_query($mysql, $sql);
    while($mstr = mysqli_fetch_assoc($result)){
        $users_m_id[$tbl_master] = trim($mstr['id']);
        $users_m_name[$tbl_master] = trim($mstr['name']);
        $users_m_login[$tbl_master] = trim($mstr['login']);
        $users_m_password[$tbl_master] = trim($mstr['password']);
        if($mstr['offers'] !== null){
            $users_m_offers[$tbl_master] = trim($mstr['offers']);
        }
        else $users_m_offers[$tbl_master] = $mstr['offers'];
        if($mstr['block'] !== null){
            $users_m_block[$tbl_master] = trim($mstr['block']);
        }
        else $users_m_block[$tbl_master] = $mstr['offers'];

        $tbl_master = $tbl_master + 1;
    }

    //Извлечение таблицы логов
    $sql = "SELECT * FROM offers_log";
    $result = mysqli_query($mysql, $sql);
    while($log = mysqli_fetch_assoc($result)){
        $log_date[$tbl_log] = trim($log['date']);
        $log_offr_id[$tbl_log] = trim($log['offer_id']);
        $log_master[$tbl_log] = trim($log['master']);
        $log_own[$tbl_log] = trim($log['own']);
        $log_price[$tbl_log] = trim($log['price']);
        $log_earnings[$tbl_log] = trim($log['earnings']);

        $tbl_log = $tbl_log + 1;
    }
