<?php
$title = 'Modification';
$submitValue = 'Modifier un film';
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="movies-update">
        <h1><?php echo $title ?></h1>
        <?php require_once(ROOT . '../views/includes/forms/movieForm.php'); ?>
        <p><?php echo $error ?></p>
    </section>
</body>

</html>
