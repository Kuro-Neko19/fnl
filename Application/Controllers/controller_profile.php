<?php
    class Controller_Profile extends Controller { 
        function action_index() { 
            $this->view->generate('profile_view.php', 'auth_panel_view.php'); 
        } 
    }
?>