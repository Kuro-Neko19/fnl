<?php namespace Controllers;
    use Core\Controller;
    class ControllerAdmAdminReg extends Controller { 
        function action_index() { 
            $this->view->generate('adm_admin_reg.php', 'auth_panel_view.php'); 
        } 
    }
