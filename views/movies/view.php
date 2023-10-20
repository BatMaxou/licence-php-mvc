<?php $title = 'Film : ' . $movie->getTitle(); ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movie-view">
        <h2><?php echo $title ?></h2>
        <div class="movie-content">
            <?php
            if ($movie->getCover()) {
                echo '<div class="movie-cover">
                    <img src="data:image/png;base64,' . base64_encode($movie->getCover()) . '" />
                </div>';
            }
            ?>
            <div class="movie-general-infos">
                <div class="infos">
                    <h3>Informations générales</h3>
                    <p>Réalisé par : <?php echo $movie->getDirector() ?></p>
                    <p>Écrit par : <?php echo $movie->getScriptwriter() ?></p>
                    <p>Genre : <?php echo $movie->getType() ?></p>
                    <p>Sortie le : <?php echo $movie->getReleaseDate() ?></p>
                    <p>Une production de : <?php echo $movie->getProductionCompany() ?></p>
                </div>
            </div>
            <div class="movie-synopsis">
                <h3>Synopsis</h3>
                <p><?php echo $movie->getSynopsis() ?></p>
            </div>
        </div>
    </section>
</body>

</html>
