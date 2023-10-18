<form action="" method="POST">
    <input type="text" placeholder="Titre" name="title" value="<?php echo $movie->getTitle() ?>" />
    <input type="text" placeholder="Réalisateur" name="director" value="<?php echo $movie->getDirector() ?>" />
    <textarea name="synopsis" placeholder="Synopsis"><?php echo $movie->getSynopsis() ?></textarea>
    <input type="text" placeholder="Genre" name="type" value="<?php echo $movie->getType() ?>" />
    <input type="text" placeholder="Scénariste" name="scriptwriter" value="<?php echo $movie->getScriptwriter() ?>" />
    <input type="text" placeholder="Société de production" name="production_company" value="<?php echo $movie->getProductionCompany() ?>" />
    <input name="release_date" type="date" value="<?php echo $movie->getReleaseDate() ?>" />
    <input type="submit" value="<?php echo $submitValue ?>"></input>
</form>
