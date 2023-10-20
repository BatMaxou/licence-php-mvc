<?php

require_once(ROOT . '../models/entity/User.php');

class UserRepository
{
    public static function getById(int $id): ?User
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT * FROM user WHERE id=:id;');
        $query->bindValue('id', $id);
        $query->execute();
        $result = $query->fetch();

        Connection::disconnect();

        if ($result) {
            return new User($result['login'], $result['password'], $result['id']);
        } else {
            return null;
        }
    }

    public static function getByLogin(string $login): ?User
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT * FROM user WHERE login=:login;');
        $query->bindValue('login', $login);
        $query->execute();
        $result = $query->fetch();

        Connection::disconnect();

        if ($result) {
            return new User($result['login'], $result['password'], $result['id']);
        } else {
            return null;
        }
    }

    public static function create(User $user): void
    {
        $connection = Connection::connect();

        $query = $connection->prepare('INSERT INTO user (login, password) VALUES (:login, :password);');
        $query->bindValue('login', $user->getLogin());
        $query->bindValue('password', $user->getPassword());
        $query->execute();

        Connection::disconnect();
    }

    public static function addMovie(Movie $movie): void
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT * FROM list WHERE user=:userId AND movie=:movieId;');
        $query->bindValue('userId', $_SESSION['user']->getId());
        $query->bindValue('movieId', $movie->getId());
        $query->execute();

        if ($query->fetch()) {
            Connection::disconnect();

            return;
        }

        $query = $connection->prepare('INSERT INTO list VALUES (:userId, :movieId);');
        $query->bindValue('userId', $_SESSION['user']->getId());
        $query->bindValue('movieId', $movie->getId());
        $query->execute();

        Connection::disconnect();
    }

    public static function removeMovie(Movie $movie): void
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT * FROM list WHERE user=:userId AND movie=:movieId;');
        $query->bindValue('userId', $_SESSION['user']->getId());
        $query->bindValue('movieId', $movie->getId());
        $query->execute();

        if (!$query->fetch()) {
            Connection::disconnect();

            return;
        }

        $query = $connection->prepare('DELETE FROM list WHERE user=:userId AND movie=:movieId;');
        $query->bindValue('userId', $_SESSION['user']->getId());
        $query->bindValue('movieId', $movie->getId());
        $query->execute();

        Connection::disconnect();
    }
}
