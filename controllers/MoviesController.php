<?php

require_once(ROOT . '../models/repository/MovieRepository.php');

function all()
{
    $movies = MovieRepository::getAll();

    require_once('../views/movies/all.php');
}

function myList()
{
    $error = '';

    verifyAuthentification();

    $movies = MovieRepository::getAllbyUser($_SESSION['user']);

    require_once('../views/movies/myList.php');
}

function view(int $id)
{
    $error = '';

    verifyAuthentification();

    $movie = MovieRepository::getById($id);

    require_once('../views/movies/view.php');
}


function add()
{
    $error = '';

    verifyAuthentification();

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
            $movie = new Movie(
                $_POST['title'],
                $_POST['director'],
                $_POST['synopsis'],
                $_POST['type'],
                $_POST['scriptwriter'],
                $_POST['production_company'],
                $_POST['release_date'],
                $_SESSION['user']
            );

            MovieRepository::create($movie);

            header('Location: /movies/all');
        }
    }
}

function update(int $id)
{
    $error = '';

    verifyAuthentification();

    $movie = MovieRepository::getById($id);

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
            MovieRepository::update($movie);

            header('Location: /movies/all');
        }
    }
}
