<?php namespace Processing;
    
    class Profile {
        public function Profile () {
            require_once realpath('Functions/Processing/profile.php');
            require_once realpath('Functions/processing/offers.php');
            require_once realpath('Functions/processing/date.php');
            require_once realpath('Application/Core/request_protection.php');
            require_once realpath('Functions/processing/admin.php');
        }
    }  
?>