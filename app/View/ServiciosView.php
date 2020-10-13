<?php

require_once "./libs/Smarty.class.php";
require_once './helpers/authHelper.php';

class ServiciosView{

    //private $title;
    

    function __construct(){
    }


    function ShowHome(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->display('templates/index.tpl');
    }

    function ShowServicios($servicios,$categorias){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('servicios',$servicios);
        $smarty->assign('categorias',$categorias);
        $smarty->display('templates/servicios.tpl');
    }

    function ShowDetalleServicio($servicio){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('servicio',$servicio);
        $smarty->display('templates/detalleServicio.tpl');
    }

    function ShowDetalleCategoria($servicios){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('servicios',$servicios);
        $smarty->display('templates/filtrado.tpl');
    }

    function ShowLogin($msg = ''){
        $smarty = new Smarty();
        $smarty->assign('msg', $msg);
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

    function ShowEditarServicio($servicio,$categorias,$msg=''){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('servicio',$servicio);
        $smarty->assign('categorias',$categorias);
        $smarty->assign('msg',$msg);
        $smarty->display('templates/editarS.tpl');
    }

    function ShowEditarCategoria($categoria,$msg=''){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('categoria',$categoria);
        $smarty->assign('msg',$msg);
        $smarty->display('templates/editarC.tpl');
    }

    function ShowAdmin(){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('isAdmin', $_SESSION['ISADMIN']);
        $smarty->display('templates/administrar.tpl');
    }
    
    function ShowAddServicio($categorias,$msg=''){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('msg',$msg);
        $smarty->assign('categorias',$categorias);
        $smarty->display('templates/addServicio.tpl');
    }

    function ShowAddCategoria($msg=''){
        $smarty = new Smarty();
        $smarty->assign('Login', isset($_SESSION));
        $smarty->assign('msg',$msg);
        $smarty->display('templates/addCategoria.tpl');
    }
    
}


?>