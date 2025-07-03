<?php namespace Controllers;
    use Core\Controller;
    class ControllerAdminLogin extends Controller { 
        function action_index() { 
            $this->view->generate('admin_login_view.php', 'empty_view.php'); 
        } 
    }
