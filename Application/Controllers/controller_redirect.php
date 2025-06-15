<?php
    class Controller_Redirect extends Controller { 
        function action_index() { 
            $this->view->generate('redirect_view.php', 'empty_view.php'); 
        } 
    }
?>