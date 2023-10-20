<?php
$title = 'Votre liste : ajouter un film';
$object = $movie;
$redirectUrl = '/movies/list';
$isDelete = false;
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="list-movie-add">
        <h2><?php echo $title ?></h2>
        <h3>Êtes-vous sûr de vouloir ajouter ce film à votre liste ?</h3>
        <?php require_once(ROOT . '../views/includes/forms/checkForm.php') ?>
    </section>
</body>

</html>
