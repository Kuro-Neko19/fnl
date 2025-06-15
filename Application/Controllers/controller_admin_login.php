<?php
    class Controller_Admin_login extends Controller { 
        function action_index() { 
            $this->view->generate('admin_login_view.php', 'empty_view.php'); 
        } 
    }
?>