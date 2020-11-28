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
        $this->authHelper = new AuthHelper();
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



     /* PAGINACION CIERRE*/


    function Servicios($params){

        $maxCategoriasPagina = 4;

        if(isset($params[':ID'])){
            $paginaActual = $params[':ID'];
            $inicio = ($paginaActual - 1) * $maxCategoriasPagina;
         }
        else{
            $paginaActual = 1;
            $inicio = 0;
        }
        
        $categorias = $this->Cmodel->GetCategoriasPaginadas($maxCategoriasPagina,$inicio);
        //$cantidadCategorias = array_count_values($categorias);
        var_dump($categorias);


        /*$maxPaginas = ceil($cantidadCategorias/$maxCategoriasPagina);//Redondea para arriba.
        
//miro a ver el número total de campos que hay en la tabla con esa búsqueda
$num_total_registros = mysql_num_rows($categorias);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

        $filtro = $categorias;
        $cantidadPaginas = $this->CantidadPaginas($categorias,$maxCategoriasPagina);
        $maxPaginas= count($cantidadPaginas);
        $categorias = $this->Paginar($categorias,$maxCategoriasPagina,$paginaActual);
        $this->view->ShowServicios($servicios,$categorias,$cantidadPaginas,$filtro,$paginaActual,$maxPaginas);
*/
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


    /* PAGINACION CIERRE*/



    function ServicioDetalle($params){
        $id = $params[':ID'];
        $isAdmin = $this->authHelper->isAdmin();
        $servicio = $this->Smodel->getServicioConCategoria($id);
        $this->view->ShowDetalleServicio($servicio,$isAdmin);
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


}


?>