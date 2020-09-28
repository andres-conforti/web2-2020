<?php

require_once "./libs/Smarty.class.php";

class TasksView{

    private $title;
    

    function __construct(){
        $this->title = "Lista de Tareas";
    }

    
    function ShowHome(){
        $smarty = new Smarty();
        $smarty->display('templates/index.tpl');
    }

    function ShowServicios($servicios,$categorias){
        $smarty = new Smarty();
        $smarty->assign('servicios',$servicios);
        $smarty->assign('categorias',$categorias);
        $smarty->display('templates/servicios.tpl');
    }

    function ShowDetalleServicios($id){
        $smarty = new Smarty();
        $smarty->assign('infoServicios',$id);
        $smarty->display('templates/detalleServicio.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function ShowLogin(){
        $smarty = new Smarty();   
        $smarty->display('templates/login.tpl');
      }

    function ShowRegister(){
        $smarty = new Smarty();   
        $smarty->display('templates/register.tpl');
      }

      function ShowFaq(){
        $smarty = new Smarty();
        $smarty->display('templates/faq.tpl');
    }

    function ShowContacto(){
        $smarty = new Smarty();
        $smarty->display('templates/contact.tpl');
    }

    
}


?>