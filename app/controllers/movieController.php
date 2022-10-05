<?php
include_once 'app/models/MovieModel.php';
include_once 'app/views/MovieView.php';


class movieController {
    private $model;
    private $view;

    function __construct()
    {
        $this->model=new MovieModel();      
        $this->view=new MovieView();      
    }

    
function showAllMovies()
{
    //obtiene las tareas del modelo
    $movies = $this->model->showAll();

    //actualizo la vista
    $this->view->showMovies($movies);
}
}