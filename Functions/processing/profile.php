<?php
    session_start();

    require_once realpath('Functions/DB/DataBase.php');

    $a = 0;

    if(isset($_GET['id']) && isset($_GET['type'])){
        $usr_id = htmlspecialchars($_GET['id']);
        $t_type = htmlspecialchars($_GET['type']);
        
        //
        if($t_type == 'master'){

        //    $sql = "SELECT * FROM master_db";
        //    $result = mysqli_query($mysql, $sql);
        //    while($mstr = mysqli_fetch_assoc($result)){
        //        $users_m_id[$tbl_master] = trim($mstr['id']);
        //        $users_m_name[$tbl_master] = trim($mstr['name']);
        //        $users_m_login[$tbl_master] = trim($mstr['login']);
        //        $users_m_password[$tbl_master] = trim($mstr['password']);
        //        if($mstr['offers'] !== null){
        //            $users_m_offers[$tbl_master] = trim($mstr['offers']);
        //        }
        //        else $users_m_offers[$tbl_master] = $mstr['offers'];
        //
        //        $tbl_master = $tbl_master + 1;
        //    }

            $sql = "SELECT * FROM master_db";
            $result = mysqli_query($mysql, $sql);
            while($usrs = mysqli_fetch_assoc($result)){
                $usersid[$a] = trim($usrs['id']);
                $usersname[$a] = trim($usrs['name']);
                $userslog[$a] = trim($usrs['login']);
                if($usrs['offers'] !== null){
                    $usersoffers[$a] = trim($usrs['offers']);
                }
                else $usersoffers[$a] = $usrs['offers'];

                $a = $a + 1;
            }
        }
        
        if($t_type == 'advertiser'){

        //    $sql = "SELECT * FROM advertiser_db";
        //    $result = mysqli_query($mysql, $sql);
        //    while($adv = mysqli_fetch_assoc($result)){
        //        $users_a_id[$tbl_adv] = trim($adv['id']);
        //        $users_a_name[$tbl_adv] = trim($adv['name']);
        //        $users_a_log[$tbl_adv] = trim($adv['login']);
        //        $users_a_pass[$tbl_adv] = trim($adv['password']);
        //
        //        $tbl_adv = $tbl_adv + 1;
        //    }

            $sql = "SELECT * FROM advertiser_db";
            $result = mysqli_query($mysql, $sql);
            while($usrs = mysqli_fetch_assoc($result)){
                $usersid[$a] = trim($usrs['id']);
                $usersname[$a] = trim($usrs['name']);
                $userslog[$a] = trim($usrs['login']);

                $a = $a + 1;
            }
        }

        if($t_type == 'admin'){

        //    $sql = "SELECT * FROM admin_db";
        //   $result = mysqli_query($mysql, $sql);
        //    while($adm = mysqli_fetch_assoc($result)){
        //        $users_adm_id[$tbl_admin] = trim($adm['id']);
        //        $users_adm_name[$tbl_admin] = trim($adm['name']);
        //        $users_adm_log[$tbl_admin] = trim($adm['login']);
        //        $users_adm_pass[$tbl_admin] = trim($adm['password']);
        //
        //        $tbl_admin = $tbl_admin + 1;
        //    }

            global $mysql;
            $sql = "SELECT * FROM admin_db";
            $result = mysqli_query($mysql, $sql);
            while($usrs = mysqli_fetch_assoc($result)){
                $usersid[$a] = trim($usrs['id']);
                $usersname[$a] = trim($usrs['name']);
                $userslog[$a] = trim($usrs['login']);

                $a = $a + 1;
            }
        }
        $arr_key = array_search($usr_id, $usersid);

        if($_GET['type'] == 'advertiser'){
            $usr_type = "Рекламодатель";
        }
        if($_GET['type'] == 'master'){
            $usr_type = "Веб-мастер";
        }
        if($_GET['type'] == 'admin'){
            $usr_type = "Админ";
        }

        $usr_login = $userslog[$arr_key];
        $usr_name = $usersname[$arr_key];

        //если мастер
        if($_GET['type'] == 'master'){
            if(!empty($usersoffers[$arr_key])){
                $ofr = explode(' ', $usersoffers[$arr_key]);
                $itr = 0;
                $l_k = array_key_last($ofr);

                do{
                    $off[$itr] = array_search($ofr[$itr], $offerid);

                    $itr = $itr + 1;
                }
                while($itr <= $l_k);

                $mm = 1;
            }

        }

        //если рекламодатель
        if($_GET['type'] == 'advertiser'){
            $l_k_ofr = array_key_last($offerown);

            $c = 0;
            $d = 0;

            do{
                if($usr_login == $offerown[$c]){
                    $ofr_adv[$d] = $c;

                    $d = $d + 1;
                }

                $c = $c + 1;
            }
            while($c <= $l_k_ofr);
            
            if(isset($ofr_adv)){
                $l_k_adv = array_key_last($ofr_adv);
            }
        }
    }
    
    if(isset($_POST['logout']) && $request->is_valid()){
        unset($_SESSION['id']);
        unset($_SESSION['usr_type']);
        unset($_SESSION['usr_login']);
        unset($_SESSION['usr_name']);
        unset($_SESSION['request_token']);
    }
