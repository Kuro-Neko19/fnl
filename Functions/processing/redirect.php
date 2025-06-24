<?php
    
    require_once realpath('Functions/DB/DataBase.php');

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

    $rdr_usr = htmlspecialchars($_GET['mstr']);
    $rdr_ofr = htmlspecialchars($_GET['offr']);
    
    if(in_array($rdr_usr, $users_m_id)){
        $rdr_key = array_search($rdr_usr, $users_m_id);

        if(!empty($users_m_offers[$rdr_key])){
            $usroffr = explode(' ', $users_m_offers[$rdr_key]);

            if(in_array($rdr_ofr, $usroffr) == true){
                if(in_array($rdr_ofr, $offerid)){
                    $rdr_key1 = array_search($rdr_ofr, $offerid);

                    header("Location: " . $offerurl[$rdr_key1]);

                    $log_date = date('d m y');
                    $log_offr_id = $rdr_ofr;
                    $log_master = $rdr_usr;
                    $log_own = $offerown[$rdr_key1];
                    $log_price = $offerprice[$rdr_key1] * 0.8;
                    $log_earnings = $offerprice[$rdr_key1] * 0.2;

                    mysqli_query($mysql, "INSERT INTO offers_log (date, offer_id, master, own, price, earnings) VALUES ('$log_date', '$log_offr_id', '$log_master', '$log_own', '$log_price', '$log_earnings')");
                }
                else header("Location: https://final.local/404");
            }
            else header("Location: https://final.local/404");
        }
        else header("Location: https://final.local/404");
    }
    else header("Location: https://final.local/404");
    
