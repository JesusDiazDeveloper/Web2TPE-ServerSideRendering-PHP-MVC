<?php
include_once 'app/controllers/movieController.php';
include_once 'app/controllers/GenreController.php';
include_once 'app/controllers/AuthController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
        $genreController = new GenreController();
        $genres = $genreController->getAll();
        $controller = new movieController();
        $controller->showAllMovies($genres);
        break;
    case 'searchMenu':
        $genreController = new GenreController();
        $genreController->showSearchPage();
        break;
    case 'searchByGenre':
        $movieController = new movieController;
        $movieController->getAllMoviesByGenre();
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
    case 'addMovie':
        $controller = new GenreController();
        $controller->addMenu();
        break;
    case 'modify':
        $controller = new movieController;
        $genreController = new GenreController;
        $id = $params[1];
        $genres = $genreController->getAll();
        $controller->showOneItemForModify($id, $genres);
        break;
    case 'modifyGenre':
        $genreController = new GenreController;
        $id = $params[1];
        $genreController->ShowOneGenreForModify($id);
        break;











        case 'modified':
            $controller = new movieController;
            $id = $params[1];
            $controller->modifyItem($id);
            break;
        case 'GenreModified':
            $controller = new GenreController;
            $id = $params[1];
            $controller->modifyGenre($id);
            break;














    case 'showOne':
        $controller = new movieController;
        $id = $params[1];
        $controller->ShowOne($id);
        break;
    case 'login':
        $authController             = new AuthController();
        $authController->showFormLogin();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'addGenre':
        //Muestra el menu
        $controller = new GenreController();
        $controller->addMenuGenre();
        break;
    case 'addNewGenre':
        //Agrega el genero a la base de datos
        $controller = new GenreController();
        $controller->addNewGenre();
        break;
        case 'showAllGenres':
        //Agrega el genero a la base de datos
        $controller = new GenreController();
        $controller->showAllGenres();
        break;
        case 'deleteGenre':
        //Agrega el genero a la base de datos
        $movieController = new movieController;
        $id = $params[1];
        $products = $movieController->getAllMoviesByGenreWithId($id);
        // var_dump($products);
        $controller = new GenreController();
        $genre = $params[1];
        $controller->deleteGenreById($genre, $products);
        break;
        case 'showOneGenre':
            $controller = new GenreController;
            $id = $params[1];
            $controller->ShowOneGenre($id);
            break;


    default:
        echo ('404 Page not found');
        break;
}
