<?php $title = 'Supprimer un film'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies-delete">
        <h1><?php echo $title ?></h1>
        <p>Etes-vous sur de supprimer le film <?php echo $movie['name'] ?></p>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $movie['id'] ?>" />
            <input type="submit" name="id" value="Oui" />
            <a href="/movies/all">Non</a>
        </form>
    </section>
</body>

</html>
