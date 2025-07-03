<?php namespace Controllers;
    use Core\Controller;
    class ControllerMasterAuth extends Controller { 
        function action_index() { 
            $this->view->generate('master_auth_view.php', 'empty_view.php'); 
        } 
    }
