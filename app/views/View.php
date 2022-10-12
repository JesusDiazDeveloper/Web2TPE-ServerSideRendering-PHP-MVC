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
    function showError(){
        echo "funcion Error";
    }
    function successMessage(){
        $this->smarty->display("templates/header");
        echo "Lo que hizo fue exitoso.";
    }
    function ShowAllMoviesByGenre($moviesByGenre){
        $this->smarty->assign('movies',$moviesByGenre);
        $this->smarty->display('templates/showMoviesByGenre.tpl');
    }
}

