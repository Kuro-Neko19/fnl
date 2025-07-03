<?php namespace Controllers;
    use Core\Controller;
    class ControllerAdmMasterReg extends Controller { 
        function action_index() { 
            $this->view->generate('adm_master_reg.php', 'auth_panel_view.php'); 
        } 
    }
