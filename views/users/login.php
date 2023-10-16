<?php $title = 'Connexion'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="login">
        <h1>Connexion</h1>
        <?php require_once(ROOT . '../views/includes/forms/userForm.php') ?>
        <p><?php echo $error ?></p>
    </section>
</body>

</html>
