<?php namespace Controllers;
    use Core\Controller;
    class ControllerError404 extends Controller { 
        function action_index() { 
            $this->view->generate('error_404.php', 'empty_view.php'); 
        } 
    }
