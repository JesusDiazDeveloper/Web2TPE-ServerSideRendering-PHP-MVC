<?php
include_once 'app/controllers/movieController.php';
include_once 'app/controllers/GenreController.php';

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
    case 'genres':
        break;
    case 'delete':
        $id = $params[1];
        $controller = new movieController();
        $controller->deleteMovie($id);
        break;
    case 'addNew':
        $controller = new movieController();
        $controller->addNew();
        break;
    case 'add':
        $controller = new GenreController();
        $controller->addMenu();
        break;
    case 'modify':
        $controller = new movieController;
        $genreController = new GenreController;
        $id = $params[1];
        $genres = $genreController->getGenres();
        $controller->showOneItemForModify($id,$genres);
        break;
    case 'modified':
        $controller = new movieController;
        $id = $params[1];
        $controller->modifyItem($id);
        break;
    default:
        echo ('404 Page not found');
        break;
}
