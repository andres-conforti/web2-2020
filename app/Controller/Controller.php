<?php

require_once 'app/View/ServiciosView.php';
require_once 'app/Model/ServiciosModel.php';
require_once 'helpers/authHelper.php';

class Controller{

    protected $view;
    protected $model;
    

    function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->view = new ServiciosView();
        $this->model = new ServiciosModel();
    }

    function Home(){
        $this->view->ShowHome();        
    }

    function Administrar(){
        $this->view->ShowAdmin();
    }

    function Contacto(){
        $this->view->ShowContacto();
    }

    function Faq(){
        $this->view->ShowFaq();
    }

    function Servicios(){
        $servicios = $this->model->GetServicios();
        $categorias = $this->model->GetCategorias();
        $this->view->ShowServicios($servicios,$categorias);
    }

    function ServicioDetalle($params){
        $id = $params[':ID'];
        $servicio =$this->model->GetServicio($id);
        $categoria = $this->model->GetCategoria($servicio->id_categoria_fk);
        $this->view->ShowDetalleServicio($servicio,$categoria);
    }

    function CategoriaDetalle(){
        if (isset($_POST['filtrar'])) {
            $categoriaFiltrada = $_POST['filtrar'];
            $servicios = $this->model->getServiciosConCategoria($categoriaFiltrada);
            $this->view->ShowDetalleCategoria($servicios);
        }else {
            header('Location: '.HOME);
        }
    }
}


?>