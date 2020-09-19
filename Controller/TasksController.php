<?php

require_once "./View/TasksView.php";
require_once "./Model/TasksModel.php";

class TasksController{

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
        $profesionales = $this->model->GetProfesionales();
        $this->view->ShowServicios($servicios,$profesionales);
    }

    function Login(){
        $this->view->Login();
    }


    function InsertProfesionalController(){
        $this->model->InsertProfesional($_POST['input_nombre'],$_POST['input_matricula'],$_POST['input_imagen']);
        $this->view->ShowServicios(); // nos manda a la tabla (SERVICIOS)
    }

    function DeleteProfesionalController($params = null){
        $id = $params[':ID'];
        $this->model->DeleteProfesional($id);
        $this->view->ShowServicios();
    }

    // revisar si esta bien
    function EditProfesionalController($params = null){
        $id = $params[':ID'];
        $this->model->EditProfesional($id,$_POST['input_nombre'],$_POST['input_matricula'],$_POST['input_imagen']);
        $this->view->ShowServicios();
    }
}


?>