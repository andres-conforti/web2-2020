<?php

require_once 'app/View/ServiciosView.php';
require_once 'app/Model/ServiciosModel.php';
require_once 'app/Model/CategoriasModel.php';
require_once 'helpers/authHelper.php';


class Controller{

    private $view;
    private $Smodel;
    private $Cmodel;
    private $authHelper;

    function __construct(){
        $authHelper = new AuthHelper();
        $this->view = new ServiciosView();
        $this->Smodel = new ServiciosModel();
        $this->Cmodel = new CategoriasModel();
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

        /*if($id<0 && $id>$maxPaginas)
        $id=1;*/
        
        $maxCategoriasPagina = 4; //maximo de paginas
        $servicios = $this->Smodel->GetServicios();
        $categorias = $this->Cmodel->GetCategorias();
        $filtro = $categorias;
        $cantidadPaginas = $this->CantidadPaginas($categorias,$maxCategoriasPagina);
        $maxPaginas= count($cantidadPaginas);



        $categorias = $this->Paginar($categorias,$maxCategoriasPagina,$id);
        $this->view->ShowServicios($servicios,$categorias,$cantidadPaginas,$filtro,$id,$maxPaginas);

    }

    
    function Paginar($Categorias,$maxCategorias,$paginaActual){
        $param1 = ($paginaActual-1)*$maxCategorias;
        $this->categorias = array_slice($Categorias,$param1,$maxCategorias);//Corta el arreglo de categorias.(Arreglo de 4 categ)
        return $this->categorias;
    }


    function CantidadPaginas($categorias,$maxCategoriasPagina){
    $cantidadCategorias = count($categorias);
    $maxPaginas = ceil($cantidadCategorias/$maxCategoriasPagina);//Redondea para arriba.

    for($x=1; $x<=$maxPaginas; $x++){
        $paginas[]=$x;
    }
    return $paginas;
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