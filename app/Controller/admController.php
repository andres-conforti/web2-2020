<?php

require_once 'app/View/ServiciosView.php';
require_once 'app/Model/ServiciosModel.php';
require_once 'app/Model/CategoriasModel.php';
require_once 'app/Controller/Controller.php';
require_once 'helpers/authHelper.php';

class admController extends Controller{

    private $view;
    private $Smodel;
    private $Cmodel;
    private $authHelper;

    function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->view = new ServiciosView();
        $this->Smodel = new ServiciosModel();
        $this->Cmodel = new CategoriasModel();
        
    }

    function borrarServicio($params = null){
        $id = $params[':ID'];
        $this->Smodel->borrarServicio($id);
        header('Location: '.SERVICIOS);
        
    }

    function borrarCategoria($params = null){
        $id = $params[':ID'];
        $this->Cmodel->borrarCategoria($id);
        header('Location: '.SERVICIOS);
    }

    function editarServicio($params = null,$msg=''){
        $id = $params[':ID'];
        $servicio = $this->Smodel->GetServicio($id);
        $categorias = $this->Cmodel->GetCategorias();
        $this->view->ShowEditarServicio($servicio,$categorias);
    }

    function editarCategoria($params = null,$msg=''){ //muetra el tpl, no es el editar
        $id = $params[':ID'];
        $categoria = $this->Cmodel->GetCategoria($id);
        $this->view->ShowEditarCategoria($categoria,$msg);
    }

    function editServicio($params = null){ //este es para la funcion luego de poner los datos, no para la pagina (tpl)
        $id = $params[':ID'];
        $nombre = $_POST['nombre'];
        $honorarios = $_POST['honorarios'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];

        if($nombre=='' || $honorarios=='' || $descripcion==''){
            
            $msg = "CAMPOS FALTANTES - PRUEBE DE NUEVO";
            $servicio = $this->Smodel->GetServicio($id);
            $categorias = $this->Cmodel->GetCategorias();
            $this->view->ShowEditarServicio($servicio,$categorias,$msg);
        }
        else{
            $this->Smodel->EditServicio($nombre,$descripcion,$honorarios,$categoria,$id);
            header('Location: '.SERVICIOS);
        }

    }

    function editCategoria($params){ //este es para la funcion luego de poner los datos, no para la pagina (tpl)
        
        $id = $params[':ID'];
        $nombre = $_POST['nombre'];
        $img = basename($_FILES["imagen"]["name"]);

        if($nombre!=''){
            if($img!=''){
            $this->uploadImage();
            }
            else{
                $img = "no-image.png";
            }
            $this->model->EditarCategoria($nombre,$img,$id);
            header('Location: '.SERVICIOS);
            }
        else{
            $msg = "NOMBRE OBLIGATORIO";
            $categoria = $this->Cmodel->GetCategoria($id);
            $this->view->ShowEditarCategoria($categoria,$msg);
            }


    }

    function addServicio($msg = ''){
        $categorias = $this->Cmodel->GetCategorias();
        $this->view->ShowAddServicio($categorias,$msg);
    }

    function addCategoria($msg = ''){
        $this->view->ShowAddCategoria($msg);
    }
    
    function newServicio(){
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $honorarios = $_POST['honorarios'];
        $descripcion = $_POST['descripcion'];
        
        if($nombre=='' || $honorarios=='' || $descripcion=='' || $categoria==''){
            $msg = "CAMPOS FALTANTES - PRUEBE DE NUEVO";
            $this->addServicio($msg);
        }
        else{
            $this->Smodel->InsertServicio($nombre,$categoria,$honorarios,$descripcion);
            header('Location: '.SERVICIOS);
        }

        
    }

    function newCategoria(){
        $nombre = $_POST['nombre'];
        $img = basename($_FILES["imagen"]["name"]);

        if($nombre!=''){
            if($img!=''){
            $this->uploadImage();
            }
            else{
                $img = "no-image.png";
            }
            $this->Cmodel->InsertCategoria($nombre,$img);
            header('Location: '.SERVICIOS);
            }
        else{
            $msg = "NOMBRE OBLIGATORIO";
            $this->addCategoria($msg);
            }

    }

    function uploadImage(){
        $name = basename($_FILES["imagen"]["name"]); //asignale a $name, el nombre de la imagen que subi (ej: imagen.png)
        move_uploaded_file($_FILES['imagen']['tmp_name'],"img/servicios/".$_FILES['imagen']['name']);  //agrega la imagen a la carpeta "img/servicios/" de nuestra pagina   
        return $name;
    }

}
    
    



?>