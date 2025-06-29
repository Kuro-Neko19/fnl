<?php
    class controller_offers extends Controller { 
        function action_index() { 
            $this->view->generate('offers_view.php', 'auth_panel_view.php'); 
        } 
    }
