<?php

require_once '../models/database/Connection.php';
require_once '../models/base_functions/BaseFunctions.php';

$pdo = connexion();

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

session_start();

$uri = explode('/', $_SERVER['REQUEST_URI']);
$uri = parseExplodeUrl($uri);

if (isset($uri[1]) && !empty($uri[1])) {
    $controller = $uri[1];
    $controllerFile = ROOT . '../controllers/' . ucfirst($controller) . 'Controller.php';

    if (file_exists($controllerFile)) {
        require_once($controllerFile);

        $action = $uri[2] ?: false;
        if ($action) {
            if (function_exists($action)) {
                isset($uri[3]) ? $action($uri[3]) : $action();
            } elseif (intval($action)) {
                view($action);
            } else {
                header('HTTP/1.0 404 Not Found');
                require_once('../views/errors/404.php');
            }
        } elseif (function_exists('all')) {
            all();
        } else {
            header('HTTP/1.0 404 Not Found');
            require_once('../views/errors/404.php');
        }
    } else {
        header('HTTP/1.0 404 Not Found');
        require_once('../views/errors/404.php');
    }
} else {
    require_once('../controllers/HomeController.php');
    home();
}
