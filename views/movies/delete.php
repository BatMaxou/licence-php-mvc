<?php
$title = 'Supprimer un film';
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies-delete">
        <h2><?php echo $title ?></h2>
        <p>Êtes-vous sûr de vouloir supprimer ce film ?</p>
        <form action="" method="POST">
            <input name="id" type="hidden" value="<?php echo $movie->getId() ?>" />
            <input type="submit" value="Oui" />
            <a href="/movies/my-list">Non</a>
        </form>
    </section>
</body>

</html>
