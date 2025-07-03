<?php namespace Controllers;
    use Core\Controller;
    class ControllerProfile extends Controller { 
        function action_index() { 
            $this->view->generate('profile_view.php', 'auth_panel_view.php'); 
        } 
    }
