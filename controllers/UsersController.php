<?php

require_once(ROOT . '../models/repository/UserRepository.php');

class UsersController
{
    public function add()
    {
        $user = new User('', '');
        $submitValue = 'S\'inscrire';
        $error = '';

        if (empty($_POST)) {
            require_once('../views/users/add.php');
        } else {
            $user->setLogin($_POST['login'])
                ->setPassword($_POST['password']);

            $tryUser = UserRepository::getByLogin($_POST['login']);
            $passed = true;

            if ('' === $user->getLogin()) {
                $passed = false;
                $error = 'L\'identifiant ne peut être vide';
            }

            if ($tryUser) {
                $passed = false;
                $error = 'Identifiant déjà utilisé';
            }

            if (
                strlen($_POST['password']) < 8
                || !preg_match('/[a-z]/', $_POST['password'])
                || !preg_match('/[A-Z]/', $_POST['password'])
                || !preg_match('/[0-9]/', $_POST['password'])
                || !preg_match('/[@$!%*?&#\'"\/&()]/', $_POST['password'])
                || str_contains($_POST['password'], $_POST['login'])
            ) {
                $passed = false;
                if ('' === $error) {
                    $error .= 'L';
                } else {
                    $error .= ', l';
                }

                $error .= "e mot de passe doit contenir au moins 8 caractères, 1 minuscule, 1 majuscule et 1 caractère spécial et ne pas contenir votre identifiant";
            }

            if ($passed) {
                UserRepository::create($user);

                header('Location: /users/login');
            } else {
                require_once('../views/users/add.php');
            }
        }
    }

    public function login()
    {

        $baseUser = new User('', '');

        $submitValue = 'Se connecter';
        $error = '';

        if (empty($_POST)) {
            $user = $baseUser;

            require_once('../views/users/login.php');
        } else {
            $user = UserRepository::getByLogin($_POST['login']);

            if ($user && password_verify($_POST['password'], $user->getPassword())) {
                $_SESSION['user'] = $user;
                header('Location: /movies/my-list');
            } else {
                $user = $baseUser;
                $error = 'Mauvais identifiants';

                require_once('../views/users/login.php');
            }
        }
    }

    public function logout()
    {
        $_SESSION = [];
        header('Location: /');
    }
}
