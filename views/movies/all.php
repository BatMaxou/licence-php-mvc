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
                    <h2>' . $movie['title'] . '</h2>
                    <p>' . $movie['type'] . '</p>
                    <a href="/movies/' . $movie['id'] . '">Voir le film</a>
                    <a href="/movies/update/' . $movie['id'] . '">Modifier le film</a>
                </div>
            ';
        }
        ?>
    </section>
</body>

</html>
