<?php
    session_start();

    require_once realpath('Functions/DB/DataBase.php');


    $itr1 = 0;
    $itr2 = 0;
    $itr3 = 0;
    $itr4 = 0;


    //$sql = "SELECT * FROM offers_log";
    //$result = mysqli_query($mysql, $sql);
    //while($log = mysqli_fetch_assoc($result)){
    //    $log_date[$tbl_log] = trim($log['date']);
    //    $log_offr_id[$tbl_log] = trim($log['offer_id']);
    //    $log_master[$tbl_log] = trim($log['master']);
    //    $log_own[$tbl_log] = trim($log['own']);
    //    $log_price[$tbl_log] = trim($log['price']);
    //    $log_earnings[$tbl_log] = trim($log['earnings']);
    //
    //    $tbl_log = $tbl_log + 1;
    //}

    $l_l_k = array_key_last($log_date);

    $current_date =  date('d m y');
    $date_expl = explode(' ', $current_date);
        $c_month = $date_expl[1];
        $c_year = $date_expl[2];

    //Статистика для мастера
        //Всего переходов и заработок по подписанным офферам
        if($_SESSION['usr_type'] == 'master' && $_SESSION['id'] == $_GET['id'] && isset($log_master)){
            $check_mstr = $_SESSION['id'];
            $number_all = 0;
            $mstr_ern_all = 0;

            $number_day = 0;
            $mstr_ern_day = 0;

            $number_month = 0;
            $mstr_ern_month = 0;

            $number_year = 0;
            $mstr_ern_year = 0;

            do{
                //переходы
                if($check_mstr == $log_master[$itr1]){
                    $number_all = $number_all + 1;

                    //доход
                    $mstr_ern_all = $mstr_ern_all + $log_price[$itr1];
                }

                $itr1 = $itr1 + 1;
            }
            while($itr1 <= $l_l_k);

            $all_tr = $number_all;
            $all_ern = $mstr_ern_all;
        }

        //Переходы и заработок за день
        if($_SESSION['usr_type'] == 'master' && $_SESSION['id'] == $_GET['id'] && isset($log_master)){

            do{
                //переходы
                if($check_mstr == $log_master[$itr2] && $current_date == $log_date[$itr2]){
                    $number_day = $number_day + 1;

                    //доход
                    $mstr_ern_day = $mstr_ern_day + $log_price[$itr2];
                }

                $itr2 = $itr2 + 1;
            }
            while($itr2 <= $l_l_k);

            $day_tr = $number_day;
            $day_ern = $mstr_ern_day;
        }

        //Переходы и заработок за месяц
        if($_SESSION['usr_type'] == 'master' && $_SESSION['id'] == $_GET['id'] && isset($log_master)){

            do{
                $db_date = explode(' ', $log_date[$itr3]);
                    $db_month = $db_date[1];
                    $db_year = $db_date[2];
                
                //переходы
                if($check_mstr == $log_master[$itr3] && $c_month == $db_month && $c_year == $db_year){
                    $number_month = $number_month + 1;

                    //доход
                    $mstr_ern_month = $mstr_ern_month + $log_price[$itr3];
                }

                $itr3 = $itr3 + 1;
            }
            while($itr3 <= $l_l_k);

            $month_tr = $number_month;
            $month_ern = $mstr_ern_month;
        }

        //Переходы и заработок за год
        if($_SESSION['usr_type'] == 'master' && $_SESSION['id'] == $_GET['id'] && isset($log_master)){

            do{
                $db_date = explode(' ', $log_date[$itr4]);
                    $db_year = $db_date[2];
                
                //переходы
                if($check_mstr == $log_master[$itr4] && $c_year == $db_year){
                    $number_year = $number_year + 1;

                    //доход
                    $mstr_ern_year = $mstr_ern_year + $log_price[$itr4];
                }

                $itr4 = $itr4 + 1;
            }
            while($itr4 <= $l_l_k);

            $year_tr = $number_year;
            $year_ern = $mstr_ern_year;
        }

        if(!isset($number_all)){
            $all_tr = 0;
            $all_ern = 0;
        }
        if(!isset($number_day)){
            $day_tr = 0;
            $day_ern = 0;
        }
        if(!isset($number_month)){
            $month_tr = 0;
            $month_ern = 0;
        }
        if(!isset($number_year)){
            $year_tr = 0;
            $year_ern = 0;
        }


    $arr_itr = 0;
    $arr_itr1 = 0;
    $arr_itr2 = 0;
    $arr_itr3 = 0;

    //Статистика для рекламодателя
        if($_SESSION['usr_type'] == 'advertiser' && $_SESSION['id'] == $_GET['id']){
            $check_adv = $_SESSION['usr_login'];
            $number_all = 0;
            $adv_exp_all = 0;

            $number_day = 0;
            $adv_exp_day = 0;

            $number_month = 0;
            $adv_exp_month = 0;

            $number_year = 0;
            $adv_exp_year = 0;

            do{
                //переходы
                if($check_adv == $log_own[$arr_itr]){
                    $number_all = $number_all + 1;

                    //расход
                    $adv_exp_all = $adv_exp_all + $log_price[$arr_itr] + $log_earnings[$arr_itr];
                }

                $arr_itr = $arr_itr + 1;
            }
            while($arr_itr <= $l_l_k);

            $all_tr = $number_all;
            $all_exp = $adv_exp_all;
        }

        //Переходы и расход за день
        if($_SESSION['usr_type'] == 'advertiser' && $_SESSION['id'] == $_GET['id']){

            do{
                //переходы
                if($check_adv == $log_own[$arr_itr1] && $current_date == $log_date[$arr_itr1]){
                    $number_day = $number_day + 1;

                    //расход
                    $adv_exp_day = $adv_exp_day + $log_price[$arr_itr1] + $log_earnings[$arr_itr1];
                }

                $arr_itr1 = $arr_itr1 + 1;
            }
            while($arr_itr1 <= $l_l_k);

            $day_tr = $number_day;
            $day_exp = $adv_exp_day;
        }

        //Переходы и заработок за месяц
        if($_SESSION['usr_type'] == 'advertiser' && $_SESSION['id'] == $_GET['id']){

            do{
                $db_date = explode(' ', $log_date[$arr_itr2]);
                    $db_month = $db_date[1];
                    $db_year = $db_date[2];

                //переходы
                if($check_adv == $log_own[$arr_itr2] && $c_month == $db_month && $c_year == $db_year){
                    $number_month = $number_month + 1;

                    //расход
                    $adv_exp_month = $adv_exp_month + $log_price[$arr_itr2] + $log_earnings[$arr_itr2];
                }

                $arr_itr2 = $arr_itr2 + 1;
            }
            while($arr_itr2 <= $l_l_k);

            $month_tr = $number_month;
            $month_exp = $adv_exp_month;
        }

        //Переходы и заработок за год
        if($_SESSION['usr_type'] == 'advertiser' && $_SESSION['id'] == $_GET['id']){

            do{
                $db_date = explode(' ', $log_date[$arr_itr3]);
                    $db_year = $db_date[2];
                
                //переходы
                if($check_adv == $log_own[$arr_itr3] && $c_year == $db_year){
                    $number_year = $number_year + 1;

                    //расход
                    $adv_exp_year = $adv_exp_year + $log_price[$arr_itr3] + $log_earnings[$arr_itr3];
                }

                $arr_itr3 = $arr_itr3 + 1;
            }
            while($arr_itr3 <= $l_l_k);

            $year_tr = $number_year;
            $year_exp = $adv_exp_year;
        }

    //статистика для админов
    $admn_itr = 0;
    $admn_itr1 = 0;
    $admn_itr2 = 0;
    $admn_itr3 = 0;
    
    $earn_sistem_all = 0;
    $earn_sistem_day = 0;
    $earn_sistem_month = 0;
    $earn_sistem_year = 0;
    //доход за всё время
    if($_SESSION['usr_type'] == 'admin'){
        do{
            $earn_sistem_all = $earn_sistem_all + $log_earnings[$admn_itr];

            $admn_itr = $admn_itr + 1;
        }
        while($admn_itr <= $l_l_k);

    }

    //доход за день
    if($_SESSION['usr_type'] == 'admin'){
        do{
            if($current_date == $log_date[$admn_itr1]){
                $earn_sistem_day = $earn_sistem_day + $log_earnings[$admn_itr1];
            }

            $admn_itr1 = $admn_itr1 + 1;
        }
        while($admn_itr1 <= $l_l_k);

    }

    //доход за месяц
    if($_SESSION['usr_type'] == 'admin'){
        do{
            $db_date = explode(' ', $log_date[$admn_itr2]);
                    $db_month = $db_date[1];
                    $db_year = $db_date[2];

            if($c_month == $db_month && $c_year == $db_year){
                $earn_sistem_month = $earn_sistem_month + $log_earnings[$admn_itr2];
            }

            $admn_itr2 = $admn_itr2 + 1;
        }
        while($admn_itr2 <= $l_l_k);

    }

    //доход за год
    if($_SESSION['usr_type'] == 'admin'){
        do{
            $db_date = explode(' ', $log_date[$admn_itr3]);
                    $db_year = $db_date[2];

            if($c_year == $db_year){
                $earn_sistem_year = $earn_sistem_year + $log_earnings[$admn_itr3];
            }

            $admn_itr3 = $admn_itr3 + 1;
        }
        while($admn_itr3 <= $l_l_k);

    }
