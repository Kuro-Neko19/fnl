<?php namespace Controllers;
    use Core\Controller;
    class ControllerCreateOffer extends Controller { 
        function action_index() { 
            $this->view->generate('create_offer_view.php', 'auth_panel_view.php'); 
        } 
    }
