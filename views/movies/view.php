<?php $title = 'Film : ' . $movie->getTitle(); ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies">
        <h1><?php echo $title ?></h1>
        <div>
            <h2>Informations générales</h2>
            <p>Réalisé par : <?php echo $movie->getDirector() ?></p>
            <p>Écrit par : <?php echo $movie->getScriptwriter() ?></p>
            <p>Genre : <?php echo $movie->getType() ?></p>
            <p>Sortie le : <?php echo $movie->getReleaseDate() ?></p>
            <p>Une production de : <?php echo $movie->getProductionCompany() ?></p>
            <h2>Synopsis</h2>
            <p><?php echo $movie->getSynopsis() ?></p>
        </div>
    </section>
</body>

</html>
