<?php
include_once 'app/models/GenreModel.php';
include_once 'app/views/View.php';


class GenreController {
    private $model;
    private $view;

    function __construct(){
        $this->model=new GenreModel();      
        $this->view=new View();      
    }

//Mostrar todos los generos.
function getAll(){
    //obtiene las tareas del modelo
    $genres = $this->model->getAll();
    return $genres;
}
function addMenu(){
    $genres = $this->getAll();
    $this->view->showAdd($genres);
}
function showSearchPage(){
    $genres = $this->getAll();
    $this->view->showSearchPage($genres);
}

}