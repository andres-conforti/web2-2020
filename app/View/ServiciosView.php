<?php

require_once "./libs/Smarty.class.php";

class ServiciosView{
    
    private $smarty;

    function __construct(){ 
        $this->smarty = new Smarty();
    }

    function ShowHome(){
        $this->smarty->display('templates/index.tpl');
    }

    function ShowDetalleServicio($servicio,$admin){
        $this->smarty->assign('servicio',$servicio);
        $this->smarty->assign('isadmin',$admin);
        $this->smarty->display('templates/detalleServicio.tpl');
    }

    function ShowDetalleCategoria($servicios,$filtro){
        $this->smarty->assign('servicios',$servicios);
        $this->smarty->assign('filtro',$filtro);
        $this->smarty->display('templates/filtrado.tpl');
    }

    function ShowLogin($msg = ''){
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/login.tpl');
    }

    function ShowRegistracion($msg = ''){  
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/registracion.tpl');
    }

    function ShowFaq(){
        $this->smarty->display('templates/faq.tpl');
    }

    function ShowContacto(){
        $this->smarty->display('templates/contact.tpl');
    }

    function Header(){
        $this->smarty->display('templates/header.tpl');
    }

    function ShowEditarServicio($servicio,$categorias,$msg=''){
        $this->smarty->assign('servicio',$servicio);
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('msg',$msg);
        $this->smarty->display('templates/editarS.tpl');
    }

    function ShowEditarCategoria($categoria,$msg=''){
        $this->smarty->assign('categoria',$categoria);
        $this->smarty->assign('msg',$msg);
        $this->smarty->display('templates/editarC.tpl');
    }
    
    function ShowAddServicio($categorias,$msg=''){
        $this->smarty->assign('msg',$msg);
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('templates/addServicio.tpl');
    }

    function ShowAddCategoria($msg=''){
        $this->smarty->assign('msg',$msg);
        $this->smarty->display('templates/addCategoria.tpl');
    }

    function ShowBusquedas($servicios,$msg=''){
        $this->smarty->assign('servicios',$servicios);
        $this->smarty->assign('msg',$msg);
        $this->smarty->display('templates/busquedas.tpl');
    }

    function ShowServicios($categorias,$servicios,$paginasTotales,$filtro,$paginaActual,$maximo){
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('servicios',$servicios);
        $this->smarty->assign('paginasTotales',$paginasTotales);
        $this->smarty->assign('filtro',$filtro);
        $this->smarty->assign('paginaActual',$paginaActual);
        $this->smarty->assign('maximo',$maximo);
        $this->smarty->display('templates/servicios.tpl');
    }
}


?>