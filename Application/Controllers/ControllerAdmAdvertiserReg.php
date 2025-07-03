<?php namespace Controllers;
    use Core\Controller;
    class ControllerAdmAdvertiserReg extends Controller { 
        function action_index() { 
            $this->view->generate('adm_advertiser_reg.php', 'auth_panel_view.php'); 
        } 
    }
