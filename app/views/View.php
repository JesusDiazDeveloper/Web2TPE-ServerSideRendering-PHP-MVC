<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class View{
    private $smarty;
    
    function __construct()
    {
        $this->smarty= new Smarty (); 
    }

    function showMovies($movies){
        
        $this->smarty->assign('movies', $movies);        
        $this->smarty->display('templates/showAllMovies.tpl');
    }
    function showAdd($genres){
        $this->smarty->assign('genres',$genres);        
        $this->smarty->display('templates/addMenu.tpl');
    }
    
    function formModify($movie , $genres){
        $this->smarty->assign('movie',$movie);
        $this->smarty->assign('genres',$genres);
        // var_dump($movie);
        $this->smarty->display('templates/formModify.tpl');
    }
    function showSearchPage($genres){
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/searchPage.tpl');
    }
    function showError(String $error){
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/showError.tpl');
    }
    function successMessage($message){
        $this->smarty->assign("message",$message);
        $this->smarty->display("templates/successMessage.tpl");
        
    }
    function ShowAllMoviesByGenre($moviesByGenre){
        $this->smarty->assign('movies',$moviesByGenre);
        $this->smarty->display('templates/showMoviesByGenre.tpl');
    }
    function showOneMovie($movie){
        $this->smarty->assign('movie',$movie);
        $this->smarty->display('templates/showOneMovie.tpl');
        
    }
    function showOneGenre($genre){
        $this->smarty->assign('genre',$genre);
        $this->smarty->display('templates/showOneGenre.tpl');
        
    }
    function showOneGenreForModify($genre){
        $this->smarty->assign('genre',$genre);
        $this->smarty->display('templates/showOneGenreForModify.tpl');
        
    }
    function showFormAddGenre(){
        $this->smarty->display('templates/FormAddGenre.tpl');
    }
    function showAllGenres($genres){
        $this->smarty->assign('genres', $genres);        
        $this->smarty->display('templates/showAllGenres.tpl');
    }
}

