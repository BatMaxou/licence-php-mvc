<div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <div class="input-group">
            <input type="text" placeholder="Titre" name="title" value="<?php echo $movie->getTitle() ?>" />
        </div>
        <div class="input-group">
            <input type="text" placeholder="Réalisateur" name="director" value="<?php echo $movie->getDirector() ?>" />
        </div>
        <div class="textarea-group">
            <textarea name="synopsis" placeholder="Synopsis" rows="5"><?php echo $movie->getSynopsis() ?></textarea>
        </div>
        <div class=" input-group">
            <input type="text" placeholder="Genre" name="type" value="<?php echo $movie->getType() ?>" />
        </div>
        <div class="input-group">
            <input type="text" placeholder="Scénariste" name="scriptwriter" value="<?php echo $movie->getScriptwriter() ?>" />
        </div>
        <div class="input-group">
            <input type="text" placeholder="Société de production" name="production_company" value="<?php echo $movie->getProductionCompany() ?>" />
        </div>
        <div class="input-group">
            <input type="date" name="release_date" value="<?php echo $movie->getReleaseDate() ?>" />
        </div>
        <div class="input-file-group">
            <label for="cover">Affiche :</label>
            <input type="file" name="cover" />
        </div>
        <input type="hidden" name="id" value="<?php echo $movie->getId() ?? '' ?>" />
        <div class="submit-group">
            <input type="submit" value="<?php echo $submitValue ?>"></input>
        </div>
    </form>
</div>
