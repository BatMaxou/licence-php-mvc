<div class="form-container">
    <form action="" method="POST" class="check-form">
        <input name="id" type="hidden" value="<?php echo $object->getId() ?>" />
        <input type="submit" value="Oui" class="btn btn-<?php echo $isDelete ? 'danger' : 'success' ?>" />
        <a href="<?php echo $redirectUrl ?>" class="btn-in-link">
            <div class="btn btn-default">Non</div>
        </a>
    </form>
</div>
