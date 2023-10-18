<?php

require_once '../models/database/Connection.php';
require_once '../models/base_functions/BaseFunctions.php';
require_once '../models/entity/User.php';

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

session_start();

require_once '../models/service/Router.php';

Router::redirect();
