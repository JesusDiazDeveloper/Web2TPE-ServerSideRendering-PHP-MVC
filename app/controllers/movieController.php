<?php
require_once 'app/models/MovieModel.php';
require_once 'app/models/GenreModel.php';
require_once 'app/views/View.php';
require_once 'app/helpers/AuthHelper.php';


class movieController
{
    private $model;
    private $view;
    private $AuthHelper;

    function __construct()
    {
        $this->model = new MovieModel();
        $this->view = new View();
        $this->AuthHelper = new AuthHelper();
    }


    function showAllMovies()
    {
        //Para las hibridas...
        $this->AuthHelper->askIfThUserIsLoggedIn();
        //obtiene las tareas del modelo
        $movies = $this->model->showAll();

        //actualizo la vista
        $this->view->showMovies($movies);
    }

    function deleteMovie($id)
    {
        $this->AuthHelper->checkLoggedIn();
        $id = $this->model->deleteById($id);
        $this->showAllMovies();
    }
    function addNew()
    {
        $this->AuthHelper->checkLoggedIn();
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
        $this->AuthHelper->checkLoggedIn();
        //falta if
        $movie = $this->model->getOneItem($id);
        // var_dump($genres);
        $this->view->formModify($movie, $genres);
    }
    function modifyItem($id){
        $this->AuthHelper->checkLoggedIn();
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
    function ShowOne($id){
        //falta if
        $movie = $this->model->getOneItem($id);
        $this->view->showOneMovie($movie);

    }
    function getAllMoviesByGenre(){
        if (!empty($_POST['id_genre'])) {
            $id = $_POST['id_genre'];
            $moviesByGenre = $this->model->getAllMoviesByGenre($id);
            if(!empty($moviesByGenre)){
                        //Para las hibridas...
                $this->AuthHelper->askIfThUserIsLoggedIn();

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
