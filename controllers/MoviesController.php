<?php

function all()
{
    $connection = connexion();

    verifyConnection();

    $query = $connection->prepare('SELECT * FROM movie');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $movies = $query->fetchAll();

    require_once('../views/movies/all.php');
}

function myList()
{
    $connection = connexion();
    $error = '';

    verifyConnection();

    $query = $connection->prepare('SELECT * FROM movie WHERE user=:id;');
    $query->bindValue('id', $_SESSION['id']);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $movies = $query->fetchAll();

    require_once('../views/movies/myList.php');
}

function view(int $id)
{
    $connection = connexion();
    $error = '';

    verifyConnection();

    $query = $connection->prepare('SELECT * FROM movie WHERE id=:id;');
    $query->bindValue('id', $id);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $movie = $query->fetch();

    require_once('../views/movies/view.php');
}


function add()
{
    $connection = connexion();
    $error = '';

    verifyConnection();

    if (empty($_POST)) {
        require_once('../views/movies/add.php');
    } else {
        if (
            '' === $_POST['title']
            || '' === $_POST['director']
            || '' === $_POST['synopsis']
            || '' === $_POST['type']
            || '' === $_POST['scriptwriter']
            || '' === $_POST['production_company']
            || '' === $_POST['release_date']
        ) {
            $movie = $_POST;
            $error = 'Veuillez remplir tous les champs';
            require_once('../views/movies/add.php');
        } else {
            $query = $connection->prepare("INSERT INTO movie(title, director, synopsis, type, scriptwriter, production_company, release_date, user) VALUES (:title, :director, :synopsis, :type, :scriptwriter, :production_company, :release_date, :user);");

            $query->bindValue('title', $_POST['title']);
            $query->bindValue('director', $_POST['director']);
            $query->bindValue('synopsis', $_POST['synopsis']);
            $query->bindValue('type', $_POST['type']);
            $query->bindValue('scriptwriter', $_POST['scriptwriter']);
            $query->bindValue('production_company', $_POST['production_company']);
            $query->bindValue('release_date', $_POST['release_date']);
            $query->bindValue('user', $_SESSION['id']);

            $query->execute();

            header('Location: /movies/all');
        }
    }
}

function update(int $id)
{
    $connection = connexion();
    $error = '';

    verifyConnection();

    $query = $connection->prepare('SELECT * FROM movie WHERE id=:id;');
    $query->bindValue('id', $id);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $movie = $query->fetch();

    if (empty($_POST)) {
        require_once('../views/movies/update.php');
    } else {
        if (
            '' === $_POST['title']
            || '' === $_POST['director']
            || '' === $_POST['synopsis']
            || '' === $_POST['type']
            || '' === $_POST['scriptwriter']
            || '' === $_POST['production_company']
            || '' === $_POST['release_date']
        ) {
            $movie = $_POST;
            $error = 'Veuillez remplir tous les champs';
            require_once('../views/movies/update.php');
        } else {
            $query = $connection->prepare("UPDATE movie SET title=:title, director=:director, synopsis=:synopsis, type=:type, scriptwriter=:scriptwriter, production_company=:production_company, release_date=:release_date WHERE id=:id;)");

            $query->bindValue('title', $_POST['title']);
            $query->bindValue('director', $_POST['director']);
            $query->bindValue('synopsis', $_POST['synopsis']);
            $query->bindValue('type', $_POST['type']);
            $query->bindValue('scriptwriter', $_POST['scriptwriter']);
            $query->bindValue('production_company', $_POST['production_company']);
            $query->bindValue('release_date', $_POST['release_date']);
            $query->bindValue('id', $movie['id']);

            $query->execute();

            header('Location: /movies/all');
        }
    }
}

function delete(int $id)
{
    $connection = connexion();

    verifyConnection();

    $query = $connection->prepare('SELECT * FROM movie WHERE id=:id;');
    $query->bindValue('id', $id);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $movie = $query->fetch();

    if (empty($_POST)) {
        require_once('../views/movies/delete.php');
    } else {
        $query = $connection->prepare("DELETE FROM movie WHERE id=:id;)");

        $query->bindValue('id', $movie['id']);

        $query->execute();

        header('Location: /movies/all');
    }
}