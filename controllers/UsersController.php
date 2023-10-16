<?php

function add()
{
    $connection = connexion();
    $user = [
        'login' => '',
        'password' => '',
    ];
    $submitValue = 'S\'inscrire';
    $error = '';

    if (empty($_POST)) {
        require_once('../views/users/add.php');
    } else {
        $query = $connection->prepare('SELECT * FROM user WHERE login=:login;');
        $query->bindValue('login', $_POST['login']);
        $query->execute();
        $result = $query->fetch();

        $passed = true;

        if ('' === $_POST['login'] || $result) {
            $passed = false;
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
        }

        if ($passed) {
            $query = $connection->prepare('INSERT INTO user(login, password) VALUES (:login, :password);');
            $query->bindValue('login', $_POST['login']);
            $query->bindValue('password', password_hash($_POST['password'], PASSWORD_ARGON2I));
            $query->execute();
            $result = $query->fetch();

            header('Location: /users/login');
        } else {
            $user = $_POST;
            $error = 'Veuillez remplir tous les champs';
            require_once('../views/users/add.php');
        }
    }
}

function login()
{
    $connection = connexion();
    $user = [
        'login' => '',
        'password' => '',
    ];
    $submitValue = 'Se connecter';
    $error = '';

    if (empty($_POST)) {
        require_once('../views/users/login.php');
    } else {
        $query = $connection->prepare('SELECT * FROM user WHERE login=:login;');
        $query->bindValue('login', $_POST['login']);
        $query->execute();
        $result = $query->fetch();

        if ($result && password_verify($_POST['password'], $result['password'])) {
            $_SESSION['login'] = $result['login'];
            $_SESSION['id'] = $result['id'];
            header('Location: /movies/my-list');
        } else {
            $user = $_POST;
            $error = 'Mauvais identifiants';
            require_once('../views/users/login.php');
        }
    }
}

function logout()
{
    $_SESSION = [];
    header('Location: /');
}
