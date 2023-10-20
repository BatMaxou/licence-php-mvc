<?php $title = 'Tous les films'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movie-all">
        <h2><?php echo $title ?> <a href="/movies/add">+</a></h2>
        <div class="container">
            <?php
            foreach ($movies as $movie) {
                echo '
                    <div class="card">
                        <div class="card-header">
                            <h3>' . $movie->getTitle() . '</h3>
                            <p>' . $movie->getType() . '</p>
                        </div>
                ';

                if ($movie->getCover()) {
                    echo '
                            <img src="data:image/png;base64,' . base64_encode($movie->getCover()) . '" />
                    ';
                } else {
                    echo '
                            <img src="/images/no-cover.png" />
                    ';
                }

                echo '
                        <div class="card-actions">
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
                    </div>
                ';
            }
            ?>
        </div>
    </section>
</body>

</html>
