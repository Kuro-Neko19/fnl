<?php
    session_start();

    require_once realpath('Application/Core/request_protection.php');
	$request = new RequestProtection;

    if(isset($_POST['advertiser_auth'])){
        header("Location: /advertiser_auth");
    }

    if(isset($_POST['master_auth'])){
        header("Location: /master_auth");
    }

    if(isset($_POST['admin_login'])){
        header("Location: /admin_login");
    }


    if(isset($_POST['offers_list']) && $request->is_valid()){
        header("Location: https://final.local/offers");
    }
    if(isset($_POST['create_offer']) && $request->is_valid()){
        header("Location: https://final.local/create_offer");
    }

    if(isset($_POST['administration']) && $request->is_valid()){
        header("Location: https://final.local/admin");
    }

    if(isset($_POST['profile']) && $request->is_valid()){
        header("Location: https://final.local/profile?id=" . $_SESSION['id'] . "&type=" . $_SESSION['usr_type']);
    }

?>