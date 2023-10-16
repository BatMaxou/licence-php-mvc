<?php
$title = 'Ajout';

$form = '
<form action="" method="POST">
    <input name="title" type="text" placeholder="Titre" />
    <input type="text" placeholder="Réalisateur" name="director" />
    <textarea name="synopsis" placeholder="Synopsis"></textarea>
    <input type="text" placeholder="Genre" name="type" />
    <input type="text" placeholder="Scénariste" name="scriptwriter" />
    <input type="text" placeholder="Société de production" name="production_company" />
    <input name="release_date" type="date" />
    <input type="submit" value="Ajouter"></input>
</form>
';

$body = '
<h1>Ajouter un film</h1>
' . $form . '
<p>' . $error . '</p>
';

require_once(__DIR__ . '/../includes/base.php');
