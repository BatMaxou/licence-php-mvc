<?php

require_once(ROOT . '../models/repository/MovieRepository.php');
require_once(ROOT . '../models/repository/UserRepository.php');

class ListController
{
    public function add(?string $id = null)
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

        if (!empty($_POST) && isset($_POST['id'])) {
            UserRepository::addMovie($movie);
            header('Location: /movies/my-list');
        }

        require_once(ROOT . '../views/list/add.php');
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

        if (!empty($_POST) && isset($_POST['id'])) {
            UserRepository::removeMovie($movie);
            header('Location: /movies/my-list');
        }

        require_once(ROOT . '../views/list/delete.php');
    }
}
