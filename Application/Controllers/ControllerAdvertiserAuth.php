<?php namespace Controllers;
    use Core\Controller;
    class ControllerAdvertiserAuth extends Controller { 
        function action_index() { 
            $this->view->generate('advertiser_auth_view.php', 'empty_view.php'); 
        } 
    }
