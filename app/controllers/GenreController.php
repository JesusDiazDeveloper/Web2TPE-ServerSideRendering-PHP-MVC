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
            try{

                $genreName = $_POST['genreName'];
                
                $this->model->addNewGenre($genreName);
    
                $this->view->successMessage("Se creo el genero con Exito!");
            }catch(Exception){
                $this->view->showError("No se pueden asignar 2 generos con el mismo nombre");                
            }
        }
        else{
            $this->view->showError("Error al enviar el nombre del genero.");
        }
    }
    function showAllGenres(){
        $this->AuthHelper->askIfThUserIsLoggedIn();
        $genres = $this->getAll();
        $this->view->showAllGenres($genres);    
    }
    
    function deleteGenreById($id, $products){
        $this->AuthHelper->checkLoggedIn();
        if (empty($products)){
            if(isset($id)){
                $this->model->deleteGenre($id);
                $this->showAllGenres();    
            }
            else{
                $this->view->showError("Error al intentar eliminar el Genero");
            }

        }
        else {
            $this->view->ShowError("No se puede eliminar un genero si tiene peliculas asignadas");
        }
    }

    function ShowOneGenre($id){
        $this->AuthHelper->askIfThUserIsLoggedIn();

        if($id){
            $genre = $this->model->getOneGenre($id);

            if($genre){
                $this->view->showOneGenre($genre);
            }
            else{
                $this->view->showError("Pelicula no encontrada");
            }
        }
        else{
            $this->view->showError("Error al intentar buscar pelicula.");
        }
    }
    function ShowOneGenreForModify($id){
        $this->AuthHelper->checkLoggedIn();
        $this->AuthHelper->askIfThUserIsLoggedIn();

        if($id){
            $genre = $this->model->getOneGenre($id);

            if($genre){
                $this->view->showOneGenreForModify($genre);
            }
            else{
                $this->view->showError("Pelicula no encontrada");
            }
        }
        else{
            $this->view->showError("Error al intentar buscar pelicula.");
        }
    }
    function modifyGenre($id){
        $this->AuthHelper->checkLoggedIn();
        if (!empty($id) && !empty($_POST['genreName'])) {
            try{
                $name = $_POST['genreName'];
                $result = $this->model->modifyGenre($id, $name);
                if($result){
                    $this->view->successMessage("Genero Modificado con exito");
    
                }
                else{
                    $this->view->showError("Error al intentar Modificar el Genero");
    
                }
            }
            catch(Exception){
                $this->view->showError("Nombre exitente en otro genero.");
            }

        }
        else{
            $this->view->showError("Error al intentar Modificar el Genero, faltan datos");
        }
    }

























    }