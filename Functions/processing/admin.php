<?php
    session_start();

    require_once realpath('Application/Core/request_protection.php');
    require_once realpath('Functions/DB/DataBase.php');

	$request = new RequestProtection;
    

    if(isset($_POST['adm_offr']) && $request->is_valid()){
        $offrs_list = 1;
        $adv_list = 0;
        $mstr_list = 0;
    }

    if(isset($_POST['adm_adv']) && $request->is_valid()){
        $offrs_list = 0;
        $adv_list = 1;
        $mstr_list = 0;
    }

    if(isset($_POST['adm_mster']) && $request->is_valid()){
        $offrs_list = 0;
        $adv_list = 0;
        $mstr_list = 1;
    }

    $last_adv_key = array_key_last($users_a_id);
    $last_mst_key = array_key_last($users_m_id);


    if(isset($_POST['adv_butt']) && $request->is_valid()){
        $adv_key = $_POST['adv_butt'];
    }
    if(isset($adv_key)){
        header("Location: https://final.local/profile?id=" . $users_a_id[$adv_key] . "&type=advertiser");
    }

    if(isset($_POST['mst_butt']) && $request->is_valid()){
        $mst_key = $_POST['mst_butt'];
    }
    if(isset($mst_key)){
        header("Location: https://final.local/profile?id=" . $users_m_id[$mst_key] . "&type=master");
    }


    if(isset($_POST['adm_reg_adv']) && $request->is_valid()){
        header("Location: https://final.local/adm_advertiser_reg");
    }
    if(isset($_POST['adm_reg_mstr']) && $request->is_valid()){
        header("Location: https://final.local/adm_master_reg");
    }
    if(isset($_POST['adm_reg_adm']) && $request->is_valid()){
        header("Location: https://final.local/adm_admin_reg");
    }


    if(isset($_GET['type']) && $_GET['type'] == 'advertiser'){
        $b_u_i = array_search($_GET['id'], $users_a_id);
        $block = 0;

        if($users_a_block[$b_u_i] == null){
            $block = 1;

            $up_id = $_GET['id'];

            if(isset($_POST['block'])){
                mysqli_query($mysql, "UPDATE advertiser_db SET block = '1' WHERE id = '$up_id'");

                header("Refresh:0");
            }
        }

        if($users_a_block[$b_u_i] !== null){
            $block = 2;

            $up_id = $_GET['id'];

            if(isset($_POST['unblock'])){
                mysqli_query($mysql, "UPDATE advertiser_db SET block = null WHERE id = '$up_id'");

                header("Refresh:0");
            }
        }
    }

