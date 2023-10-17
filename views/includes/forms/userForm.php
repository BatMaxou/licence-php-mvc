<form action="" method="POST">
    <input name="login" type="text" placeholder="login" value="<?php echo $user->getLogin() ?>" />
    <input name="password" type="password" placeholder="password" />
    <input type="submit" value="<?php echo $submitValue ?>" />
</form>
