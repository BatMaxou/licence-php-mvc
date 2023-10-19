<?php $title = 'Ma liste'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="my-list">
        <h2><?php echo $title ?></h2>
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

                if ($_SESSION['user']->getId() === $movie->getCreator()->getId()) {
                    echo '
                            <a href="/movies/update/' . $movie->getId() . '">Modifier</a>
                            <a href="/movies/delete/' . $movie->getId() . '">Supprimer</a>
                    ';
                }

                echo '
                            <a href="/list/delete/' . $movie->getId() . '">Retirer de ma liste</a>
                        </div>
                    </div>
                ';
            }
            ?>
        </div>
    </section>
</body>

</html>
