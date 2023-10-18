<?php $title = 'Tous les films'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies">
        <h1><?php echo $title ?></h1>
        <?php
        foreach ($movies as $movie) {
            echo '
                <div>
                    <h2>' . $movie->getTitle() . '</h2>
                    <p>' . $movie->getType() . '</p>
                    <img src="" />
                    <a href="/movies/' . $movie->getId() . '">Voir</a>
                    ';

            if (!in_array($movie, $listedMovies)) {
                echo '
                    <a href="/list/add/' . $movie->getId() . '">Ajouter à ma liste</a>
                ';
            }

            if ($_SESSION['user']->getId() === $movie->getCreator()->getId()) {
                echo '
                    <a href="/movies/update/' . $movie->getId() . '">Modifier</a>
                    <a href="/movies/delete/' . $movie->getId() . '">Supprimer</a>
                ';
            }

            echo '
                    </div>
            ';
        }
        ?>
    </section>
</body>

</html>
