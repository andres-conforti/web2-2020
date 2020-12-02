<?php

require_once 'app/View/ServiciosView.php';
require_once 'app/Model/ServiciosModel.php';
require_once 'app/Model/CategoriasModel.php';
require_once 'app/Model/UserModel.php';
require_once 'app/View/AdminView.php';
require_once 'app/Controller/Controller.php';
require_once 'helpers/authHelper.php';

class admController extends Controller{

    private $view;
    private $Smodel;
    private $Cmodel;
    private $userModel;
    private $authHelper;
    private $adminView;

    function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->view = new ServiciosView();
        $this->Smodel = new ServiciosModel();
        $this->Cmodel = new CategoriasModel();
        $this->userModel = new UserModel();
        $this->adminView = new AdminView();
        
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

    function borrarImg($params = null){
        $id = $params[':ID'];
        $img = $_POST['img'];
       var_dump($img);
        if($img != null ){
            $this->Cmodel->borrarImg($id);
            unlink("img/servicios/".$img);
            
        }
        header('Location: '.EDITAR."/".$id);
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
        $rutaTemp = $_FILES['imagen']['tmp_name'];
        $nombreImagen = $_FILES['imagen']['name'];

        if($nombre!=''){
            if($nombreImagen!=''){
            $img = $this->uploadImage($rutaTemp,$nombreImagen);
            }
            else{
                $img= $_POST['img'];
            }
            $this->Cmodel->EditarCategoria($nombre,$img,$id);
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
        $rutaTemp = $_FILES['imagen']['tmp_name'];//ruta+nombre del archivo temporal 'C:\TUDAI\PROGRAMAS\xampp\tmp\php241F.tmp'
        $nombreImagen = $_FILES['imagen']['name'];//nombre del archivo original image.png
        
        if (!empty($nombre)) {
            //se encarga de mover la imagen a la carpeta del proyecto
            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" ||
            $_FILES['imagen']['type'] == "image/png"){
                $img = $this->uploadImage($rutaTemp,$nombreImagen);
            }
            else{
                $img = null;
            }
            $this->Cmodel->InsertCategoria($nombre,$img);
            header('Location: '.SERVICIOS);
            }
        else{
            $msg = "NOMBRE OBLIGATORIO";
            $this->addCategoria($msg);
                }
    }

    function uploadImage($rutaTemp,$nombreImagen){
        $img = uniqid() . "." . pathinfo($nombreImagen, PATHINFO_EXTENSION);;
        move_uploaded_file($rutaTemp,"img/servicios/".$img);
        return $img;
    }
    
    function administracion(){
        $usuarios = $this->userModel->getAllUsers();
        $this->adminView->ShowAdministracion($usuarios);
    }

    function editPermisos($params = null){
        $id = $_POST['id'];
        $isAdmin = $_POST['isAdmin'];
        if($isAdmin==0){
            $isAdmin=1;
        }
        else{
            $isAdmin=0;
        }
        $this->userModel->EditUsuario($isAdmin,$id);

        header('Location: '.ADM);
    }

    function deleteUser($params = null){
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
            $this->userModel->borrarUsuario($id);
        }
        header('Location: '.ADM);
    }

  
}



?>