<?php namespace Controllers;
    use Core\Controller;
    class ControllerEditing extends Controller { 
        function action_index() { 
            $this->view->generate('editing_view.php', 'empty_view.php'); 
        } 
    }
