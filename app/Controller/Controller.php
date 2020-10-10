<?php

require_once 'app/View/TasksView.php';
require_once 'app/Model/TasksModel.php';
require_once 'helpers/authHelper.php';

class Controller{

    private $view;
    private $model;
    

    function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->view = new TasksView();
        $this->model = new TasksModel();
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
        echo "entro?";
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