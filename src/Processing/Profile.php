<?php namespace Processing;
    
    class Profile {
        public function connectProfile () {
            require_once realpath('Functions/Processing/Profile.php');
            require_once realpath('Functions/processing/Offers.php');
            require_once realpath('Functions/processing/Date.php');
            require_once realpath('Application/Core/request_protection.php');
            require_once realpath('Functions/processing/Admin.php');
        }
    }  
