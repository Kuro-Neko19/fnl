<?php namespace Controllers;
    use Core\Controller;
    class ControllerMain extends Controller { 
        function action_index() { 
            $this->view->generate('main_view.php', 'empty_view.php'); 
        } 
    }
