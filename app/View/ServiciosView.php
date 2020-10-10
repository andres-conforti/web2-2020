<?php

require_once "./libs/Smarty.class.php";
require_once './helpers/authHelper.php';

class ServiciosView{

    //private $title;
    

    function __construct(){
        //$this->title = "Lista de Tareas";
    }

    //$smarty->assign('Login', $_SESSION['ISADMIN']);  - para proxima entrega.

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/index.tpl');
    }

    function ShowServicios($servicios,$categorias){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        //$smarty->assign('Admin', $_SESSION['ISADMIN']); para proxima entrega
        $smarty->assign('servicios',$servicios);
        $smarty->assign('categorias',$categorias);
        $smarty->display('templates/servicios.tpl');
    }

    function ShowDetalleServicio($servicio,$categoria){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('servicio',$servicio);
        $smarty->assign('categoria',$categoria);
        $smarty->display('templates/detalleServicio.tpl');
    }

    function ShowDetalleCategoria($servicios){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('servicios',$servicios);
        $smarty->display('templates/filtrado.tpl');
    }

    function ShowLogin(){
        $smarty = new Smarty();   
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/login.tpl');
      }

    function ShowRegister(){
        $smarty = new Smarty();   
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/register.tpl');
      }

      function ShowFaq(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/faq.tpl');
    }

    function ShowContacto(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/contact.tpl');
    }

    function Header(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/header.tpl');
    }

    function ShowEditarServicio($servicio,$categorias){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('categorias',$categorias);
        $smarty->assign('servicio',$servicio);
        $smarty->display('templates/editarS.tpl');
    }

    function ShowEditarCategoria($categoria){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('categoria',$categoria);
        $smarty->display('templates/editarC.tpl');
    }

    function ShowAdmin(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('isAdmin', $_SESSION['ISADMIN']);
        $smarty->display('templates/administrar.tpl');
    }
    
    function ShowAddServicio($categorias){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('categorias',$categorias);
        $smarty->display('templates/addServicio.tpl');
    }

    function ShowAddCategoria(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/addCategoria.tpl');
    }

    
}


?>