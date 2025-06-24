<?php
    class Controller_Editing extends Controller { 
        function action_index() { 
            $this->view->generate('editing_view.php', 'empty_view.php'); 
        } 
    }
