<?php namespace Controllers;
    use Core\Controller;
    class ControllerOffers extends Controller { 
        function action_index() { 
            $this->view->generate('offers_view.php', 'auth_panel_view.php'); 
        } 
    }
