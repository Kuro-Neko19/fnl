<?php
    session_start();

    require_once realpath('Application/Core/request_protection.php');
    require_once realpath('Functions/DB/DataBase.php');

	$request = new RequestProtection;
    

    if(!isset($_GET['id'])){
        header("Location: https://final.local/404");
    }

    if(isset($_GET['id'])){
        $pos = array_search($_GET['id'], $offerid);

        if($offerown[$pos] !== $_SESSION['usr_login']){
            header("Location: https://final.local/404");
        }

        $edit_name = $offername[$pos];
        $edit_about = $offerabout[$pos];
        $edit_price = $offerprice[$pos];
        $edit_url = $offerurl[$pos];
    
        if(isset($_POST['edit']) && $request->is_valid()){
            $offer_name = htmlspecialchars($_POST['offer_name']);
            $about = htmlspecialchars($_POST['about']);
            $price = htmlspecialchars($_POST['price']);
            $url = $_POST['url'];
 
            $crt_off = 1;
        }
    
        if(isset($crt_off) && isset($offer_name) && isset($about) && isset($price) && strlen($about) < 1000 && isset($url) && strlen($url) < 1000){
            $id_offr = $_GET['id'];

            mysqli_query($mysql, "UPDATE offers_db SET offer_name = '$offer_name', offer_about = '$about', price = '$price', url = '$url' WHERE offer_id = '$id_offr'");

            header("Location: https://final.local/offer?id=" . $id_offr);
        }
    }