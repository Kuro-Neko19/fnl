<?php
    class Controller_Adm_admin_reg extends Controller { 
        function action_index() { 
            $this->view->generate('adm_admin_reg.php', 'auth_panel_view.php'); 
        } 
    }
