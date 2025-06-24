<?php
    session_start();

    require_once realpath('Application/Core/request_protection.php');
    require_once realpath('Functions/DB/DataBase.php');

	$request = new RequestProtection;
    
    
    if(isset($_POST['create']) && $request->is_valid()){
        $offer_name = htmlspecialchars($_POST['offer_name']);
        $about = htmlspecialchars($_POST['about']);
        $price = htmlspecialchars($_POST['price']);
        $url = $_POST['url'];

        $crt_off = 1;
    }
    
    if(isset($crt_off) && isset($offer_name) && isset($about) && isset($price) && strlen($about) < 1000 && isset($url) && strlen($url) < 1000){
        $own = $_SESSION['usr_login'];

        mysqli_query($mysql, "INSERT INTO offers_db (offer_name, offer_about, price, own, url) VALUES ('$offer_name', '$about', '$price', '$own', '$url')");

    }
