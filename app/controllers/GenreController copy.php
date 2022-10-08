<?php
include_once 'app/models/GenreModel.php';
include_once 'app/views/View.php';


class GenreController {
    private $model;
    private $view;

    function __construct()
    {
        $this->model=new GenreModel();      
        $this->view=new View();      
    }

//Mostrar todos los generos.
function showAllGenres()
{
    //obtiene las tareas del modelo
    $genres = $this->model->getAllGenres();

    //actualizo la vista FALTA HACER.
    // $this->view->showGenres($genres);
}

}