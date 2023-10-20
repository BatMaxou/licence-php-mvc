<div class="form-container">
    <form action="" method="POST" class="form">
        <div class="input-group">
            <input name="login" type="text" placeholder="login" value="<?php echo $user->getLogin() ?>" />
        </div>
        <div class="input-group">
            <input name="password" type="password" placeholder="password" />
        </div>
        <div class="submit-group">
            <input type="submit" value="<?php echo $submitValue ?>" />
        </div>
    </form>
</div>
