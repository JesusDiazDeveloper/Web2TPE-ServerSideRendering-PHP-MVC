<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';

class View{
    private $smarty;
    
    function __construct()
    {
        $this->smarty= new Smarty (); 
        $this->smarty->assign('BASE_URL', BASE_URL);
    }

    function showMovies($movies){
        
        $this->smarty->assign('movies', $movies);
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/showAllMovies.tpl');
        $this->smarty->display('templates/footer.tpl');
    }
    function showAddMenuForm(){
        
    }
}

