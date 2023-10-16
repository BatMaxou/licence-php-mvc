<?php
$title = 'Login';
$form = '
<form action="" method="POST">
    <input name="login" type="text" placeholder="login"></input>
    <input name="password" type="password" placeholder="password"></input>
    <input type="submit" value="Sign in"></input>
</form>
';

$body = '
<h1>Login</h1>
<p>Page de login</p>
' . $form . '
<p>' . $error . '</p>
';

require_once(__DIR__ . '/../includes/base.php');
