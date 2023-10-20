<?php
$title = 'Supprimer un film';
$object = $movie;
$redirectUrl = '/movies/list';
$isDelete = true;
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies-delete">
        <h2><?php echo $title ?></h2>
        <h3>Êtes-vous sûr de vouloir supprimer ce film ?</h3>
        <?php require_once(ROOT . '../views/includes/forms/checkForm.php') ?>
    </section>
</body>

</html>
