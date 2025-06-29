<?php
    class controller_editing extends Controller { 
        function action_index() { 
            $this->view->generate('editing_view.php', 'empty_view.php'); 
        } 
    }
