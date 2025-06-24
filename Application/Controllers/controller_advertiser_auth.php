<?php
    class Controller_Advertiser_auth extends Controller { 
        function action_index() { 
            $this->view->generate('advertiser_auth_view.php', 'empty_view.php'); 
        } 
    }
