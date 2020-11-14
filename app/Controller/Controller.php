<?php

require_once 'app/View/ServiciosView.php';
require_once 'app/Model/ServiciosModel.php';
require_once 'app/Model/CategoriasModel.php';
require_once 'app/Controller/Paginacion.php';
require_once 'helpers/authHelper.php';


class Controller{

    private $view;
    private $Smodel;
    private $Cmodel;
    private $authHelper;
    private $paginacion;

    function __construct(){
        $authHelper = new AuthHelper();
        $this->view = new ServiciosView();
        $this->Smodel = new ServiciosModel();
        $this->Cmodel = new CategoriasModel();
        $this->pag = new Paginacion();
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

    function Servicios($params){
        if(isset($params[':ID'])){
            $id = $params[':ID'];
        }
        else{
            $id = 1;
        }
        
        $maxPaginas = 4; //maximo de paginas
        $servicios = $this->Smodel->GetServicios();
        $categorias = $this->Cmodel->GetCategorias();
        $filtro = $categorias;
        $cantidadPaginas = $this->pag->Paginar($categorias,$maxPaginas,$id);
        $categorias = $this->pag->fetchResult();
        //var_dump($id);
        //var_dump($cantidadPaginas);
        $aux = count($cantidadPaginas);
        if($id==1){
            //echo "IF";
            $anterior = 1;
            $siguiente = $anterior+1;
        }
        elseif($id==$aux){
            //echo "ElseIF";
            $siguiente = $aux;
            $anterior = $aux-1;
        }
        else{
            //echo "ELSE";
            $siguiente = $id+1;
            $anterior = $id-1;
        }

        $this->view->ShowServicios($servicios,$categorias,$cantidadPaginas,$siguiente,$anterior,$filtro);
        /*
        echo "<br>"."<br>"."<br>";
        var_dump($categorias);
        echo "<br>"."<br>"."<br>";
        var_dump($servicios);
        echo "<br>"."<br>"."<br>";
        var_dump($cantidadPaginas);
        echo "<br>"."<br>"."<br>";
        */
    }

    function ServicioDetalle($params){
        $id = $params[':ID'];
        $servicio =$this->Smodel->getServicioConCategoria($id);
        //print_r($servicio);
        $this->view->ShowDetalleServicio($servicio);
    }

    function CategoriaDetalle(){
        if (isset($_POST['filtrar']) && ("ERROR"!=$_POST['filtrar'])) {
            $categoriaFiltrada = $_POST['filtrar'];
            $servicios = $this->Smodel->getServiciosConCategoria($categoriaFiltrada);
            $this->view->ShowDetalleCategoria($servicios);
        }
        else {
            header('Location: '.SERVICIOS);
        }
    }
    function BusquedaServicios($params){
        $id = $_POST['buscar'];
        $servicios =$this->Smodel->BuscarServicio($id);
        if($servicios){
            $this->view->ShowBusquedas($servicios);
        }else{
            $msg= "No se encontraron resultados";
            $this->view->ShowBusquedas($servicios, $msg);
        }
    }

    function BusquedaHonorarios($params){
        $servicios = null;
        if(!empty($_POST['valor']) && !empty($_POST['honorario'])){
            $valor = $_POST['valor'];
            $honorario = $_POST['honorario'];
            if($valor == "mayor"){
                $servicios =$this->Smodel->BuscarHonorarioMayor($honorario);
            }else{
                $servicios =$this->Smodel->BuscarHonorarioMenor($honorario);
            }
        }
        if($servicios){
            $this->view->ShowBusquedas($servicios);
        }else{
            $msg= "No se encontraron resultados";
            $this->view->ShowBusquedas($servicios, $msg);
        }
    }

    function PaginacionCategorias(){

    }
}


?>