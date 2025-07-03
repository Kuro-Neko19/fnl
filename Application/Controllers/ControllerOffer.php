<?php namespace Controllers;
    use Core\Controller;
    class ControllerOffer extends Controller { 
        function action_index() { 
            $this->view->generate('offer_view.php', 'auth_panel_view.php'); 
        } 
    }
