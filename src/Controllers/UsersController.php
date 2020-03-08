<?php

    namespace Controllers;
    use View\View;

    class UsersController
    {
        private $view;

        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../templates');
        }

        public function signUp()
        {
            $this->view->renderHtml('users/signUp.php');
        }
    }

?>