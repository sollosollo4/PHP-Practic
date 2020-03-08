<?php

    namespace Controllers;

    use Exceptions\InvalidArgumentException;
    use Models\Users\User;
    use Models\Users\UserActivationService;
    use Services\EmailSender;
    use Services\UsersAuthService;

    class UsersController extends AbstractController
    {

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
                    $code = UserActivationService::createActivationCode($user);

                    EmailSender::send($user, 'Активация', 'userActivation.php', [
                        'userId' => $user->getId(),
                        'code' => $code
                    ]);

                    $this->view->renderHtml('users/signUpSuccessful.php');
                    return;
                }
            }

            $this->view->renderHtml('users/signUp.php');
        }

        public function activate(int $userId, string $activationCode)
        {
            $user = User::getById($userId);
            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
            if ($isCodeValid) {
                $user->activate();
                echo 'OK!';
            }
        }

        public function login()
        {
            if (!empty($_POST)) {
                try {
                    $user = User::login($_POST);
                    UsersAuthService::createToken($user);
                    header('Location: /PHP-Practic/www/');
                    exit();
                } catch (InvalidArgumentException $e) {
                    $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                    return;
                }
            }

            $this->view->renderHtml('users/login.php');
        }

        public function logout(){

            unset($_COOKIE['token']);
            setcookie('token', null, -1, '/');
            header('Location: /PHP-Practic/www/');
        }

        
    }

?>