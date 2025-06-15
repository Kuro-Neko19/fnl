<?php
    class Controller_Offer extends Controller { 
        function action_index() { 
            $this->view->generate('offer_view.php', 'auth_panel_view.php'); 
        } 
    }
?>