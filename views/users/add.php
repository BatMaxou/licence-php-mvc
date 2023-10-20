<?php $title = 'S\'inscrire'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="inscription">
        <h2>Inscription</h2>
        <?php require_once(ROOT . '../views/includes/forms/userForm.php') ?>
        <p class="error"><?php echo $error ?></p>
    </section>
</body>

</html>
