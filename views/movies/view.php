<?php $title = 'Film : ' . $movie['title']; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies">
        <h1><?php echo $title ?></h1>
        <div>
            <h2>Informations générales</h2>
            <p>Réalisé par : <?php echo $movie['director'] ?></p>
            <p>Écrit par : <?php echo $movie['scriptwriter'] ?></p>
            <p>Genre : <?php echo $movie['type'] ?></p>
            <p>Sortie le : <?php echo $movie['release_date'] ?></p>
            <p>Une production de : <?php echo $movie['production_company'] ?></p>
            <h2>Synopsis</h2>
            <p><?php echo $movie['synopsis'] ?></p>
            <a href="/movies/update/<?php echo $movie['id'] ?>">Modifier le film</a>
        </div>
    </section>
</body>

</html>
