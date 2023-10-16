<?php

function home()
{
    require_once('../views/home/home.php');
}

function login()
{
    $connection = connexion();
    $error = '';

    if (empty($_POST)) {
        require_once('../views/home/login.php');
    } else {
        $query = $connection->prepare('SELECT * FROM user WHERE login=:login;');
        $query->bindValue('login', $_POST['login']);
        $query->execute();
        $result = $query->fetch();

        if ($result && password_verify($_POST['password'], $result['password'])) {
            $_SESSION['login'] = $result['login'];
            $_SESSION['id'] = $result['id'];
            header('Location: /?page=movie/all');
        } else {
            $error = 'Mauvais identifiants';
            require_once('../views/home/login.php');
        }
    }
}

function logout()
{
    $_SESSION = [];
    header('Location: /?page=/');
}
