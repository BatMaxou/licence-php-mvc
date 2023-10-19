<?php

require_once(ROOT . '../models/repository/UserRepository.php');
require_once(ROOT . '../models/repository/MovieRepository.php');

class MoviesController
{
    public function all()
    {
        verifyAuthentification();

        $movies = MovieRepository::getAll();
        $listedMovies = MovieRepository::getListbyUser($_SESSION['user']);

        require_once(ROOT . '../views/movies/all.php');
    }

    public function myList()
    {
        $error = '';

        verifyAuthentification();

        $movies = MovieRepository::getListbyUser($_SESSION['user']);

        require_once(ROOT . '../views/movies/myList.php');
    }

    public function view(?string $id = null)
    {
        if (!verifyArguments([['value' => $id, 'isInt' => true]])) {
            return;
        }

        $error = '';

        verifyAuthentification();

        $movie = MovieRepository::getById($id);

        require_once(ROOT . '../views/movies/view.php');
    }


    public function add()
    {
        $error = '';
        $movie = new Movie('', '', '', '', '', '', '', new User('', ''));

        verifyAuthentification();


        if (empty($_POST)) {
            require_once(ROOT . '../views/movies/add.php');
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
                $movie = new Movie(
                    $_POST['title'],
                    $_POST['director'],
                    $_POST['synopsis'],
                    $_POST['type'],
                    $_POST['scriptwriter'],
                    $_POST['production_company'],
                    $_POST['release_date'],
                    new User('', '')
                );

                $error = 'Veuillez remplir tous les champs';

                require_once(ROOT . '../views/movies/add.php');
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

                if (isset($_FILES['cover']) && isset($_FILES['cover']['tmp_name']) && '' !== $_FILES['cover']['tmp_name']) {
                    $movie->setCover(file_get_contents($_FILES['cover']['tmp_name']));
                }

                MovieRepository::create($movie);
                header('Location: /movies/all');
            }
        }
    }

    public function update(?string $id = null)
    {
        if (!verifyArguments([['value' => $id, 'isInt' => true]])) {
            return;
        }

        $error = '';

        verifyAuthentification();

        $movie = MovieRepository::getById($id);

        if (!$movie) {
            header('HTTP/1.0 404 Not Found');
            require_once(ROOT . '../views/errors/404.php');

            return;
        }

        if (empty($_POST)) {
            require_once(ROOT . '../views/movies/update.php');
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

                require_once(ROOT . '../views/movies/update.php');
            } else {
                if (isset($_FILES['cover']) && isset($_FILES['cover']['tmp_name']) && '' !== $_FILES['cover']['tmp_name']) {
                    $movie->setCover(file_get_contents($_FILES['cover']['tmp_name']));
                }

                MovieRepository::update($movie);
                header('Location: /movies/all');
            }
        }
    }

    public function delete(?string $id = null)
    {
        if (!verifyArguments([['value' => $id, 'isInt' => true]])) {
            return;
        }

        verifyAuthentification();

        $movie = MovieRepository::getById($id);

        if (!$movie) {
            header('HTTP/1.0 404 Not Found');
            require_once(ROOT . '../views/errors/404.php');

            return;
        }

        if ($_SESSION['user']->getId() === $movie->getCreator()->getId()) {
            if (!empty($_POST) && isset($_POST['id'])) {
                MovieRepository::delete((int) $_POST['id']);
                header('Location: /movies/all');
            }

            require_once(ROOT . '../views/movies/delete.php');
        } else {
            $error = 'Vous n\'avez pas le droit de supprimer ce film';

            require_once(ROOT . '../views/errors/other.php');
        }
    }
}
