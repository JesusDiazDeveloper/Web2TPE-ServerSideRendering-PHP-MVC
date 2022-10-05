<?php
include_once 'app/controllers/movieController.php';
require_once "functions.php";
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
        $controller = new movieController();
        $controller->showAllMovies();
        break;
    case 'login':
        break;
    case 'generos':
        break;
    case 'delete':
        $id = $params[1];
        delete($id);
        break;
    case 'agregar':
        break;
    default:
        echo ('404 Page not found');
        break;
}

            // case 'modify':
            //     $id = $params[1];
            //     showOneItemForModify($id);
            //     break;
            // case 'modified':
            //     $id = $params[1];
            //     modifyItem($id);
            //     break;