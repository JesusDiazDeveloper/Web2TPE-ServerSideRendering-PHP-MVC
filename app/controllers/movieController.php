<?php
include_once 'app/models/MovieModel.php';
include_once 'app/models/GenreModel.php';
include_once 'app/views/View.php';


class movieController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new MovieModel();
        $this->view = new View();
        // $authHelper->checkLoggedIn();
    }


    function showAllMovies()
    {
        //obtiene las tareas del modelo
        $movies = $this->model->showAll();

        //actualizo la vista
        $this->view->showMovies($movies);
    }

    function deleteMovie($id)
    {
        $id = $this->model->deleteById($id);
        $this->showAllMovies();
    }
    function addNew()
    {
        if (
            !empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['length'])
            && !empty($_POST['director']) && !empty($_POST['fk_genre_id'])
        ) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $length = $_POST['length'];
            $director = $_POST['director'];
            $genre = $_POST['fk_genre_id'];


            $this->model->addNew($name, $image, $length, $director, $genre);
            $this->showAllMovies();
        } else {
            echo "Show Error Tengo que terminarlo... ";
        }
    }
    function showOneItemForModify($id, $genres)
    {
        //falta if
        $movie = $this->model->getOneItem($id);
        // var_dump($movie);
        $this->view->formModify($movie, $genres);
    }
    function modifyItem($id)
    {
        if (!empty($id) && !empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['length'])
            && !empty($_POST['director']) && !empty($_POST['fk_genre_id'])
        ) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $length = $_POST['length'];
            $director = $_POST['director'];
            $genre = $_POST['fk_genre_id'];


            $result = $this->model->modifyItem($id, $name, $image, $length, $director, $genre);
            $this->showAllMovies();
            // echo $result;
            // if(!empty($result)){
            //     $this->view->successMessage();
            // }
            // else{
            //     $this->view->showError();
            // }
        }
    }
    function getAllMoviesByGenre()
    {
        if (!empty($_POST['id_genre'])) {
            $id = $_POST['id_genre'];
            $moviesByGenre = $this->model->getAllMoviesByGenre($id);
            if(!empty($moviesByGenre)){
                $this->view->ShowAllMoviesByGenre($moviesByGenre);

            }
            else{
                $this->view->showError();
            }
        } else {
            $this->view->showError();
        }
    }
}
