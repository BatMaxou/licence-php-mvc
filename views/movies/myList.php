<?php $title = 'Votre liste'; ?>

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
                    <a href="/movies/' . $movie->getId() . '">Voir le film</a>
                    <a href="/movies/update/' . $movie->getId() . '">Modifier le film</a>
                </div>
            ';
        }
        ?>
    </section>
</body>

</html>
