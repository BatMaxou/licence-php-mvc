<?php
$title = 'Modification';

$form = '
<form action="" method="POST">
    <input type="hidden" name="id" value="' . $movie['id'] . '" />
    <input type="submit" name="id" value="Oui" />
    <a href="/?page=movie/all"/>Non</a>
</form>
';

$body = '
<h1>Supprimer un film</h1>
<p>Etes-vous sur de supprimer le film ' . $movie['name'] . '</p>
' . $form . '
';

require_once(__DIR__ . '/../includes/base.php');
