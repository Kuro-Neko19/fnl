<?php
    class Controller_Adm_master_reg extends Controller { 
        function action_index() { 
            $this->view->generate('adm_master_reg.php', 'auth_panel_view.php'); 
        } 
    }
