<?php
$title = 'Votre liste : enlever un film';
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="list-movie-add">
        <h1><?php echo $title ?></h1>
        <p>Êtes-vous sûr de vouloir enlever ce film de votre liste ?</p>
        <form action="" method="POST">
            <input name="id" type="hidden" value="<?php echo $movie->getId() ?>" />
            <input type="submit" value="Oui" />
            <a href="/movies/my-list">Non</a>
        </form>
    </section>
</body>

</html>
