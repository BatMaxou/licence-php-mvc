<?php

require_once(ROOT . '../models/entity/Movie.php');
require_once(ROOT . '../models/repository/UserRepository.php');

class MovieRepository
{
    public static function getAll(): array
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT * FROM movie');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();

        Connection::disconnect();

        $movies = [];
        foreach ($query->fetchAll() as $arrayMovie) {
            $movie = new Movie(
                $arrayMovie['title'],
                $arrayMovie['director'],
                $arrayMovie['synopsis'],
                $arrayMovie['type'],
                $arrayMovie['scriptwriter'],
                $arrayMovie['production_company'],
                $arrayMovie['release_date'],
                UserRepository::getById($arrayMovie['user']),
                $arrayMovie['id']
            );

            $movies[] = $movie->setCover($arrayMovie['cover']);
        }

        return $movies;
    }

    public static function getListbyUser(User $user): array
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT m.* FROM list l, movie m, user u WHERE l.user = u.id AND l.movie = m.id AND u.id=:id;');
        $query->bindValue('id', $user->getId());
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();

        Connection::disconnect();

        $movies = [];
        foreach ($query->fetchAll() as $arrayMovie) {
            $movie = new Movie(
                $arrayMovie['title'],
                $arrayMovie['director'],
                $arrayMovie['synopsis'],
                $arrayMovie['type'],
                $arrayMovie['scriptwriter'],
                $arrayMovie['production_company'],
                $arrayMovie['release_date'],
                UserRepository::getById($arrayMovie['user']),
                $arrayMovie['id']
            );

            $movies[] = $movie->setCover($arrayMovie['cover']);
        }

        return $movies;
    }

    public static function getById(int $id): ?Movie
    {
        $connection = Connection::connect();

        $query = $connection->prepare('SELECT * FROM movie WHERE id=:id;');
        $query->bindValue('id', $id);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $arrayMovie = $query->fetch();

        Connection::disconnect();

        if ($arrayMovie) {
            $movie = new Movie(
                $arrayMovie['title'],
                $arrayMovie['director'],
                $arrayMovie['synopsis'],
                $arrayMovie['type'],
                $arrayMovie['scriptwriter'],
                $arrayMovie['production_company'],
                $arrayMovie['release_date'],
                UserRepository::getById($arrayMovie['user']),
                $arrayMovie['id']
            );

            return $movie->setCover($arrayMovie['cover']);
        }

        return null;
    }

    public static function create(Movie $movie): void
    {
        $connection = Connection::connect();

        $query = $connection->prepare('INSERT INTO movie (title, director, synopsis, type, scriptwriter, production_company, release_date, user, cover) VALUES (:title, :director, :synopsis, :type, :scriptwriter, :production_company, :release_date, :user, :cover);');
        $query->bindValue('title', $movie->getTitle());
        $query->bindValue('director', $movie->getDirector());
        $query->bindValue('synopsis', $movie->getSynopsis());
        $query->bindValue('type', $movie->getType());
        $query->bindValue('scriptwriter', $movie->getScriptwriter());
        $query->bindValue('production_company', $movie->getProductionCompany());
        $query->bindValue('release_date', $movie->getReleaseDate());
        $query->bindValue('user', $movie->getCreator()->getId());
        $query->bindValue('cover', $movie->getCover());

        $query->execute();
        Connection::disconnect();
    }

    public static function update(Movie $movie): void
    {
        $connection = Connection::connect();

        $query = $connection->prepare('UPDATE movie SET title=:title, director=:director, synopsis=:synopsis, type=:type, scriptwriter=:scriptwriter, production_company=:production_company, release_date=:release_date, cover=:cover WHERE id=:id;');
        $query->bindValue('title', $movie->getTitle());
        $query->bindValue('director', $movie->getDirector());
        $query->bindValue('synopsis', $movie->getSynopsis());
        $query->bindValue('type', $movie->getType());
        $query->bindValue('scriptwriter', $movie->getScriptwriter());
        $query->bindValue('production_company', $movie->getProductionCompany());
        $query->bindValue('release_date', $movie->getReleaseDate());
        $query->bindValue('cover', $movie->getCover());
        $query->bindValue('id', $movie->getId());
        $query->execute();

        Connection::disconnect();
    }

    public static function delete(int $id)
    {
        $connection = Connection::connect();

        $query = $connection->prepare('DELETE FROM movie WHERE id=:id;');
        $query->bindValue('id', $id);
        $query->execute();

        Connection::disconnect();
    }
}
