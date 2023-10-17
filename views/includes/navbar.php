<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <?php
        if (isset($_SESSION['user'])) {
            echo '
                <li><a href="/movies">Liste des films</a></li>
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
</nav>
