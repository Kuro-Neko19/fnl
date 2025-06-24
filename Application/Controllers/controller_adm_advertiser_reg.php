<?php
    class Controller_Adm_advertiser_reg extends Controller { 
        function action_index() { 
            $this->view->generate('adm_advertiser_reg.php', 'auth_panel_view.php'); 
        } 
    }
