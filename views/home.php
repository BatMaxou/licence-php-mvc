<?php $title = 'Bienvenue'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once(ROOT . '../views/includes/header.php'); ?>

<body>
    <?php require_once(ROOT . '../views/includes/navbar.php'); ?>

    <section id="home">
        <h1><?php echo $title ?></h1>
        <p>Ce site est un mini-projet réalisé dans le cadre de ma licence. Il permet, à l'aide d'un compte, d'ajouter / modifier / supprimer des films, ainsi que de consulter / ajouter dans notre liste / enlever de notre liste l'ensemble des films créer par les autres utilisateurs.</p>
    </section>
</body>

</html>
