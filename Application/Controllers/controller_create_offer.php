<?php
    class Controller_Create_offer extends Controller { 
        function action_index() { 
            $this->view->generate('create_offer_view.php', 'auth_panel_view.php'); 
        } 
    }
