<?php

require_once '../models/database/Connection.php';
require_once '../models/base_functions/BaseFunctions.php';

$pdo = connexion();

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

session_start();

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $params = explode('/', $_GET['page']);

    if ($params[0] !== '') {
        $controller = $params[0];
        $action = isset($params[1]) ? $params[1] : 'list';
        $controllerFile = ROOT . '../controllers/' . ucfirst($controller) . 'Controller.php';

        if (file_exists($controllerFile)) {
            require_once($controllerFile);

            if (function_exists($action)) {
                if (isset($params[2])) {
                    $action($params[2]);
                } else {
                    $action();
                }
            } else {
                header('HTTP/1.0 404 Not Found');
                require_once('../views/errors/404.html');
            }
        } else {
            header('HTTP/1.0 404 Not Found');
            require_once('../views/errors/404.html');
        }
    } else {
        require_once('../controllers/HomeController.php');
        home();
    }
}
