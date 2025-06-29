<?php namespace Controllers;
    use Core\Controller;
    class controller_master_auth extends Controller { 
        function action_index() { 
            $this->view->generate('master_auth_view.php', 'empty_view.php'); 
        } 
    }
