<?php

require_once 'app/View/TasksView.php';
require_once 'app/Model/TasksModel.php';
require_once 'helpers/authHelper.php';

class Controller{

    private $view;
    private $model;
    

    function __construct(){
        $authHelper = new AuthHelper();
        $this->view = new TasksView();
        $this->model = new TasksModel();
    }

    function Home(){
        $this->view->ShowHome();
        
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

    function InsertCategoriaController(){
        $this->model->InsertCategoria($_POST['input_nombre'],$_POST['input_matricula'],$_POST['input_imagen']);
        $this->view->ShowServicios(); // nos manda a la tabla (SERVICIOS)
    }

    function DeleteCategoriaController($params = null){
        $id = $params[':ID'];
        $this->model->DeleteCategoria($id);
        $this->view->ShowServicios();
    }

    // revisar si esta bien
    function EditCategoriaController($params = null){
        $id = $params[':ID'];
        $this->model->EditCategoria($id,$_POST['input_nombre'],$_POST['input_matricula'],$_POST['input_imagen']);
        $this->view->ShowServicios();
    }
}


?>