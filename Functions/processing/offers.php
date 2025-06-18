<?php
    session_start();

    require_once realpath('Application/Core/request_protection.php');

    require realpath('vendor/autoload.php');

spl_autoload_extensions(".php");
spl_autoload_register();

    $connect = new DB\DataBase;
    $connect->connectDB();

	$request = new RequestProtection;


    if(isset($offerid)){
        $last_key = array_key_last($offerid);
    }


    if(isset($_POST['offer_butt']) && $request->is_valid()){
        $offr_key = $_POST['offer_butt'];
    }

    if(isset($offr_key)){
        header("Location: https://final.local/offer?id=" . $offerid[$offr_key]);
    }


    if(isset($_GET['id'])){
        $id_offr = htmlspecialchars($_GET['id']);

        $arr_key = array_search($id_offr, $offerid);

        $public_name = $offername[$arr_key];
        $public_about = $offerabout[$arr_key];
        $public_price = $offerprice[$arr_key];
        if($offersub[$arr_key] == null){
            $public_sub = 0;
        }
        if($offersub[$arr_key] !== null){
            $public_sub = $offersub[$arr_key];
        }
    }


    if(isset($_SESSION['id']) && $_SESSION['usr_type'] == 'master'){

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

        $arr_key1 = array_search($_SESSION['id'], $users_m_id);
        if(!empty($users_m_offers[$arr_key1])){
            $ofr = explode(' ', $users_m_offers[$arr_key1]);
        }
        else $ofr = array();


        if(isset($id_offr) && in_array($id_offr, $ofr) == false){
            if(isset($_POST['subscribe'])){
                //счётчик
                $sub = $offersubscriptions[$arr_key];
                if($sub >= 0){
                    $sub = $sub + 1;
                }
                if($sub == null){
                    $sub = 1;
                }
            
                mysqli_query($mysql, "UPDATE offers_db SET subscriptions = '$sub' WHERE offer_id = '$id_offr'");

                //запись о подписи в БД
                if($users_m_offers[$arr_key1] !== null){
                    $id_of = $users_m_offers[$arr_key1] . ' ' . $id_offr . ' ';
                }
                if($users_m_offers[$arr_key1] == null){
                    $id_of = $id_offr . ' ';
                }
                mysqli_query($mysql, "UPDATE master_db SET offers = '$id_of' WHERE id = '$users_m_id[$arr_key1]'");

                header("Refresh:0");
            }

            $rdrct_url = null;
        }
        if(isset($id_offr) && in_array($id_offr, $ofr) == true){
            if(isset($_POST['unsubscribe'])){
                $del_key = array_search($id_offr, $ofr);
                array_splice($ofr, $del_key, 1);
                $lst_k = array_key_last($ofr);

                $rw = 0;
                if(!empty($ofr)){
                    do{
                        if(!empty($rwrt)){
                            $rwrt = $rwrt . ' ' . $ofr[$rw] . ' ';
                        }
                        if(empty($rwrt)){
                            $rwrt = $ofr[$rw] . ' ';
                        }

                    $rw = $rw + 1;
                    }
                    while($rw <= $lst_k);

                    mysqli_query($mysql, "UPDATE master_db SET offers = '$rwrt' WHERE id = '$users_m_id[$arr_key1]'");
                }
                if(empty($ofr)){
                    mysqli_query($mysql, "UPDATE master_db SET offers = null WHERE id = '$users_m_id[$arr_key1]'");
                }

                //счётчик
                $sub = $offersubscriptions[$arr_key];
                if($sub >= 0){
                    $sub = $sub - 1;

                    mysqli_query($mysql, "UPDATE offers_db SET subscriptions = '$sub' WHERE offer_id = '$id_offr'");
                }


                header("Refresh:0");
            }

            $rdrct_master = $_SESSION['id'];
            $rdrct_offer = $id_offr;
            $rdrct_url = 'https://final.local/redirect?mstr=' . $rdrct_master . '&offr=' . $rdrct_offer;

        }
    }

    if(isset($arr_key)){
        if($_SESSION['usr_login'] == $offerown[$arr_key] && $_SESSION['usr_type'] == 'advertiser'){
            if(isset($_POST['edit'])){
                header("Location: https://final.local/editing?id=" . $_GET['id']);
            }
        }
    }
?>