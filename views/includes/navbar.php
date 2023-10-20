<nav class="navbar">
    <img src='/images/logo.png' alt="logo" class="logo" />
    <ul class="menu">
        <li><a href="/">Accueil</a></li>
        <?php
        if (isset($_SESSION['user'])) {
            echo '
                <li><a href="/movies">Tous les films</a></li>
                <li><a href="/movies/my-list">Ma liste</a></li>
                <li><a href="/users/logout">Se déconnecter</a></li>
            ';
        } else {
            echo '
                <li><a href="/users/login">Se connecter</a></li>
                <li><a href="/users/add">S\'inscrire</a></li>
            ';
        }
        ?>
    </ul>
    <p <?php echo isset($_SESSION['user']) ? 'class="connected-user"' : '' ?>>
        <?php
        if (isset($_SESSION['user'])) {
            echo '<span class="dot-green"></span> ' . $_SESSION['user']->getLogin();
        }
        ?>
    </p>
</nav>
