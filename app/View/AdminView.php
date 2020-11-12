<?php

require_once "./libs/Smarty.class.php";

class AdminView{
    
    private $smarty;

    function __construct(){ 
        $this->smarty = new Smarty();
    }

    function ShowAdministracion($usuarios){
        //$this->smarty->assign('msg',$msg);
        $this->smarty->assign('usuarios',$usuarios);
        $this->smarty->display('templates/administrar.tpl');
    }
}

?>