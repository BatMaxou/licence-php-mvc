<?php
$title = 'Modification';

$form = '
<form action="" method="POST">
    <input name="title" type="text" placeholder="Titre" value="' . $movie['title'] . '" />
    <input type="text" placeholder="Réalisateur" name="director" value="' . $movie['director'] . '" />
    <textarea name="synopsis" placeholder="Synopsis">' . $movie['synopsis'] . '</textarea>
    <input type="text" placeholder="Genre" name="type" value="' . $movie['type'] . '" />
    <input type="text" placeholder="Scénariste" name="scriptwriter" value="' . $movie['scriptwriter'] . '" />
    <input type="text" placeholder="Société de production" name="production_company" value="' . $movie['production_company'] . '" />
    <input name="release_date" type="date" value="' . $movie['release_date'] . '" />
    <input type="submit" value="Modifier"></input>
</form>
';

$body = '
<h1>Modifier un film</h1>
' . $form . '
<p>' . $error . '</p>
';

require_once(__DIR__ . '/../includes/base.php');
