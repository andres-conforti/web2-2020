<?php

require_once 'app/View/ServiciosView.php';
require_once 'app/Model/ServiciosModel.php';
require_once 'app/Controller/Controller.php';
require_once 'helpers/authHelper.php';

class admController extends Controller{

    protected $view;
    protected $model;
    

    function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $authHelper->checkAdmin();
        $this->view = new ServiciosView();
        $this->model = new ServiciosModel();
        
    }


function InsertCategoriaController(){
        $this->model->InsertCategoria($_POST['input_nombre'],$_POST['input_matricula'],$_POST['input_imagen']);
        $this->view->ShowServicios(); // nos manda a la tabla (SERVICIOS)
    }

    function borrarServicio($params = null){
        $id = $params[':ID'];
        $this->model->borrarServicio($id);
        //$this->view->ShowServicios();
        header('Location: '.SERVICIOS);
        
    }

    function borrarCategoria($params = null){
        $id = $params[':ID'];
        $this->model->borrarCategoria($id);
        header('Location: '.SERVICIOS);
    }

    // revisar si esta bien

    function editarServicio($params = null){
        $id = $params[':ID'];
        $servicio = $this->model->GetServicio($id);
        $categorias = $this->model->GetCategorias();
        $this->view->ShowEditarServicio($servicio,$categorias);
    }

    function editarCategoria($params = null){
        $id = $params[':ID'];
        $categoria = $this->model->GetCategoria($id);
        $this->view->ShowEditarCategoria($categoria);
    }

    function editServicio($params = null){ //este es para la funcion luego de poner los datos, no para la pagina (tpl)
        $id = $params[':ID'];
        $nombre = $_POST['nombre'];
        $honorarios = $_POST['honorarios'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        //echo $id."<br>".$nombre."<br>".$honorarios."<br>".$descripcion."<br>".$categoria."<br>";
        $this->model->EditServicio($nombre,$descripcion,$honorarios,$categoria,$id);
        echo "<br> PASO EL MODEL";
        header('Location: '.SERVICIOS);
    }

    function editCategoria($params = null){ //este es para la funcion luego de poner los datos, no para la pagina (tpl)
        $id = $params[':ID'];
        $this->model->EditarCategoria($id,$_POST['input_nombre'],$_POST['input_matricula'],$_POST['input_imagen']);
        header('Location: '.SERVICIOS);
    }

    function addServicio(){
        $categorias = $this->model->GetCategorias();
        $this->view->ShowAddServicio($categorias);
    }

    function addCategoria(){
        $this->view->ShowAddCategoria();
    }
    
    function newServicio(){
        $nombre = $_POST['nombre'];
        $honorarios = $_POST['honorarios'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $this->model->InsertServicio($nombre,$categoria,$honorarios,$descripcion);
        header('Location: '.SERVICIOS);
    }

    function newCategoria(){
        $nombre = $_POST['nombre'];
        $imagen = $this->uploadImage();
        $this->model->InsertCategoria($nombre,$imagen);
        header('Location: '.SERVICIOS);
    }

    function uploadImage(){
        $name = basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES['imagen']['tmp_name'],"img/servicios/".$_FILES['imagen']['name']);

        //echo "<br>"."NOMBRE A SUBIR EN BBDD:   ".$name."<br>";
        
        return $name;
    }
}
    
    



?>