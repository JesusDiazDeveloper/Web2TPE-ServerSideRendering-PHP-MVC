<?php
include_once 'app/models/MovieModel.php';
include_once 'app/models/GenreModel.php';
include_once 'app/views/View.php';


class movieController {
    private $model;
    private $view;

    function __construct()
    {
        $this->model=new MovieModel();      
        $this->view=new View();      
    }

    
function showAllMovies()
{
    //obtiene las tareas del modelo
    $movies = $this->model->showAll();

    //actualizo la vista
    $this->view->showMovies($movies);
}

function deleteMovie($id){
    $id = $this->model->deleteById($id);
    $this->showAllMovies();
    
}
}