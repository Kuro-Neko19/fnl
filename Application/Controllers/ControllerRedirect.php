<?php namespace Controllers;
    use Core\Controller;
    class ControllerRedirect extends Controller { 
        function action_index() { 
            $this->view->generate('redirect_view.php', 'empty_view.php'); 
        } 
    }
