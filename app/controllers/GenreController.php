<?php
require_once 'app/models/GenreModel.php';
require_once 'app/views/View.php';
require_once 'app/helpers/AuthHelper.php';


class GenreController
{
    private $model;
    private $view;
    private $AuthHelper;


    function __construct()
    {
        $this->model = new GenreModel();
        $this->view = new View();
        $this->AuthHelper = new AuthHelper();
    }

    //Mostrar todos los generos.
    function getAll()
    {
        //obtiene las tareas del modelo
        $genres = $this->model->getAll();
        return $genres;
    }
    function addMenu()
    {
        // $this->checkLoggedIn();
        $this->AuthHelper->checkLoggedIn();
        $genres = $this->getAll();
        $this->view->showAdd($genres);
    }
    function showSearchPage()
    {
        //Para las hibridas...
        $this->AuthHelper->askIfThUserIsLoggedIn();

        $genres = $this->getAll();
        $this->view->showSearchPage($genres);
    }
    function addMenuGenre(){
        $this->AuthHelper->checkLoggedIn();
        $this->view->showFormAddGenre();
    }
    function addNewGenre(){
        $this->AuthHelper->checkLoggedIn();
        if(!empty([$_POST['genreName']])){
            $genreName = $_POST['genreName'];
            $this->model->addNewGenre($genreName);

            $this->view->successMessage();
        }
        else{
            $this->view->showError();
        }

    }
}
