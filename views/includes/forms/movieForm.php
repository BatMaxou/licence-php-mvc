<form action="" method="POST">
    <input name="title" type="text" placeholder="Titre" value="<?php echo $movie['title'] ?>" />
    <input type="text" placeholder="Réalisateur" name="director" value="<?php echo $movie['director'] ?>" />
    <textarea name="synopsis" placeholder="Synopsis"><?php echo $movie['synopsis'] ?></textarea>
    <input type="text" placeholder="Genre" name="type" value="<?php echo $movie['type'] ?>" />
    <input type="text" placeholder="Scénariste" name="scriptwriter" value="<?php echo $movie['scriptwriter'] ?>" />
    <input type="text" placeholder="Société de production" name="production_company" value="<?php echo $movie['production_company'] ?>" />
    <input name="release_date" type="date" value="<?php echo $movie['release_date'] ?>" />
    <input type="submit" value="<?php echo $submitValue ?>"></input>
</form>
