<?php

require_once "./View/TasksView.php";
require_once "./Model/TasksModel.php";

class Controller{

    private $view;
    private $model;

    function __construct(){
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

    function ServicioDetalle($params = null){
        $id = $params[':ID'];
        $servicio = $this->model->GetServicio($id);
        //$categorias = $this->model->GetCategorias(); 
        $this->view->ShowDetalleServicios($servicio);
    }

    function Login(){
        $this->view->ShowLogin();
    }

    function Register(){
        $this->view->ShowRegister();
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