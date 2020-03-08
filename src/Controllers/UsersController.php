<?php

    namespace Controllers;
    use Models\Users\User;
    use View\View;
    use Exceptions\InvalidArgumentException;

    class UsersController
    {
        private $view;

        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../templates');
        }

        public function signUp()
        {
            if (!empty($_POST)) {
                try {
                    $user = User::signUp($_POST);
                } catch (InvalidArgumentException $e) {
                    $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                    return;
                }

                if ($user instanceof User) {
                    $this->view->renderHtml('users/signUpSuccessful.php');
                    return;
                }
            }
            $this->view->renderHtml('users/signUp.php');
        }
    }

?>