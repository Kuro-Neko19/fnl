<?php
    session_start();

    class RequestProtection {

        private $hash;
        public $previous_hash;

        function __construct()
        {
            if(!isset($_SESSION['request_token'])){
                $this->hash = $_SESSION['request_token'] = md5(uniqid());
            }

                $this->previous_hash = $_SESSION['request_token'];
            
        }

        public function is_valid($key = 'csrf_token'){
            return (isset($_POST[$key]) && ($_POST[$key] === $this->previous_hash)) ||
                   (isset($_GET[$key]) && ($_GET[$key] === $this->previous_hash));
        }

        public function meta_tag($key = 'csrf_token'){
            return '<meta name="' . $key . '" value="' . $this->previous_hash . '"/>';
        }
    }
