<?php

require_once "./libs/Smarty.class.php";

class TasksView{

    private $title;
    

    function __construct(){
        $this->title = "Lista de Tareas";
    }

    
    function ShowHome(){

        $smarty = new Smarty();
        $smarty->display('templates/header.tpl');
        $smarty->display('templates/navbar.tpl');
        $smarty->display('templates/index.tpl');
        $smarty->display('templates/footer.tpl');
         // muestro el template 
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}


?>