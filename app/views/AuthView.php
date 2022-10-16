<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';


class AuthView{
    private $smarty;
    public function __construct(){
        $this->smarty= new Smarty (); 

    }

    function showFormLogin($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/loginForm.tpl');
    }
    function showError(String $error){
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/showError.tpl');
    }
}