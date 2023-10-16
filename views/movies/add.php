<?php
$title = 'Ajouter un film';
$submitValue = 'Ajouter';
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies-add">
        <h1><?php echo $title ?></h1>

        <?php require_once(ROOT . '../views/includes/forms/movieForm.php'); ?>

        <p><?php $error ?></p>
    </section>
</body>

</html>