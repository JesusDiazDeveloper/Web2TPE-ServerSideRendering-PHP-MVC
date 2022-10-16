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
            !empty($_POST['name']) && !empty($_FILES['image']) && !empty($_POST['length'])
            && !empty($_POST['director']) && !empty($_POST['fk_genre_id'])
        ) {
            if($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" ) {
                try{
                    $name = $_POST['name'];
                    $image = $_FILES['image']['tmp_name'];
                    $length = $_POST['length'];
                    $director = $_POST['director'];
                    $genre = $_POST['fk_genre_id'];
        
        
                    $this->model->addNew($name, $image, $length, $director, $genre);
                    $this->showAllMovies(); 
                }
                catch(Exception){
                    $this->view->showError("Nombre exitente en otra pelicula.");
                }
                
            }
            else{
                $this->view->showError("Formato de imagen no permitido.");   
            }
            
        } else {
            $this->view->showError("Un campo obligatorio no fue completado.");
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
        if (!empty($id) && !empty($_POST['name']) && !empty($_POST['length'])
            && !empty($_POST['director']) && !empty($_POST['fk_genre_id'])
        ) {
            if($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" ) {
                try{
                    $name = $_POST['name'];
                    $image = $_FILES['image']['tmp_name'];
                    $length = $_POST['length'];
                    $director = $_POST['director'];
                    $genre = $_POST['fk_genre_id'];
        
        
                    $result = $this->model->modifyItem($id, $name, $image, $length, $director, $genre);
                    
                    if($result){
                        $this->view->successMessage("La modificacion se realizo con exito");
                    }
                    else{
                        $this->view->showError("Ocurrio un error al intentar Modificar la pelicula");
                    }
                }
                catch(Exception){
                    $this->view->showError("Nombre exitente en otra pelicula.");
                }
            }
            else{
                $this->view->showError("Formato de imagen no permitido.");   
            }
        }
        else{
            $this->view->showError("Error al modificar la pelicula, faltan datos.");
        }
    }
    function ShowOne($id){
        if($id){
            $movie = $this->model->getOneItem($id);

            if($movie){
                $this->view->showOneMovie($movie);
            }
            else{
                $this->view->showError("Pelicula no encontrada");
            }
        }
        else{
            $this->view->showError("Error al intentar buscar pelicula.");
        }
    }
    function getAllMoviesByGenre(){
        $this->AuthHelper->askIfThUserIsLoggedIn();
        if (!empty($_POST['id_genre'])) {
            $id = $_POST['id_genre'];
            $moviesByGenre = $this->model->getAllMoviesByGenre($id);
            if(!empty($moviesByGenre)){
                        //Para las hibridas...
                $this->AuthHelper->askIfThUserIsLoggedIn();

                $this->view->ShowAllMoviesByGenre($moviesByGenre);

            }
            else{
                $this->view->showError("No se encontraron peliculas con ese genero.");
            }
        } else {
            $this->view->showError("No se encontraron peliculas con ese genero");
        }
    }
    function getAllMoviesByGenreWithId($id){
        if (!empty($id)) {
            $moviesByGenre = $this->model->getAllMoviesByGenre($id);
            return $moviesByGenre;
        } else {
            $this->view->showError("Error al intentar borrar un genero");
        }
}
}

