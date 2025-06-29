<?php
    class controller_admin extends Controller { 
        function action_index() { 
            $this->view->generate('admin_view.php', 'auth_panel_view.php'); 
        } 
    }
