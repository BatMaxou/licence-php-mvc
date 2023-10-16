<?php

function home()
{
    require_once('../views/home.php');

    dd(['home' => ['test' => 'double'], 'title' => 'Home']);
}
