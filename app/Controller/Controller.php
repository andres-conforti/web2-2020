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

        $maxCategorias = 4; // Declaro la cantidad de categorias que quiero ver por pagina

        if(isset($params[':ID'])){
            $paginaActual = $params[':ID'];
            // Declaro el offset que voy a utilizar para los llamados a la BBDD.
            // seria como $inicio+=$maxCategorias sin guardar la variable cada llamado;
            // osea segun la pagina, le suma el valor $maxCategorias las cantidades necesarias.
            // Se le resta 1 a $paginaActual por que sino nos salteamos 1 pagina.
            $inicio = ($paginaActual - 1) * $maxCategorias; 
         }
        else{
            //si no le pasamos parametros a web2-2020/servicios/:ID, nos muestra la pagina 1 por defecto.
            $paginaActual = 1;
            $inicio = 0;
        }
        
        //TRAIGO "X" CANTIDAD DE CATEGORIAS, COMENZANDO A BUSCAR DESDE UN OFFSET $INICIO.
        $categorias = $this->Cmodel->GetCategoriasPaginadas($maxCategorias,$inicio);
        //TRAIGO TODOS LOS SERVICIOS, QUE COINCIDAN CON EL MISMO LIMITE Y OFFSET ANTERIOR.
        $servicios = $this->Smodel->GetServiciosPaginados($maxCategorias,$inicio);
        //FILTRO SOLO ES PARA MOSTRAR TODAS LAS CATEGORIAS EXISTENTES.
        $filtro = $this->Cmodel->getCategorias();
        //CALCULO CUANTAS PAGINAS VOY A NECESITAS MOSTRAR EN LA BARRA DE PAGINACION
        //DIVIDIENDO TODAS LAS CATEGORIAS QUE TENGO POR EL MAXIMO QUE MUESTRO UTILIZANDO EL CEIL PARA OBTENER UN VALOR MAS ARRIBA DEL QUE ES
        //DE ESTA FORMA NO ME QUEDA LA ULTIMA PAGINA DE LA BARRA DE PAGINACION SIN MOSTRARSE
        //EJ: SI NO LO HAGO Y TENGO 5 CATEGORIAS Y MUESTRO 4, LA BARRA DE PAGINACION ME MOSTRARIA 1 SOLA PAGINA PARA SELECCIONAR, EN VES DE 2.
        $maximo = ceil((count($filtro))/$maxCategorias);
        //CREO UN ARREGLO DE NUMEROS QUE VA DEL 1 AL $MAXIMO INCLUSIVE, PARA PODER UTILIZARLO COMO BARRA DE PAGINACION.
        $paginasTotales = range(1,$maximo);
        
        $this->view->ShowServicios($categorias,$servicios,$paginasTotales,$filtro,$paginaActual,$maximo);

    }

    /* PAGINACION CIERRE*/

    //para ver los detalles de un servicio
    function ServicioDetalle($params){
        $id = $params[':ID'];
        $isAdmin = $this->authHelper->isAdmin();
        $servicio = $this->Smodel->getServicioConCategoria($id);
        $this->view->ShowDetalleServicio($servicio,$isAdmin);
    }

    //el filtro para ver que servicios pertenecen a cierta categoria.
    function CategoriaDetalle(){
        if (isset($_POST['filtrar']) && ("ERROR"!=$_POST['filtrar'])) {
            $categoriaFiltrada = $_POST['filtrar'];
            $servicios = $this->Smodel->GetDetalleServicios($categoriaFiltrada);
            $filtro = $this->Cmodel->getCategorias();
            $this->view->ShowDetalleCategoria($servicios,$filtro);
        }
        else {
            header('Location: '.SERVICIOS);
        }
    }

    
    //PARA FILTRAR POR PALABRA CLAVE
    function BusquedaServicios($params){
        $servicios = null;
        if(!empty($_POST['buscar'])){
        $id = $_POST['buscar'];
        $servicios = $this->Smodel->BuscarServicio($id);

        if($servicios){
            $this->view->ShowBusquedas($servicios);
        }
        else{
            $msg= "NO SE ENCONTRARON RESULTADOS";
            $this->view->ShowBusquedas($servicios, $msg);
            }
        }

        else{
            $msg= "POR FAVOR INGRESE UN PARAMETRO PARA BUSCAR";
            $this->view->ShowBusquedas($servicios, $msg);
        }
    }

    //PARA FILTRAR POR HONORARIOS
    function BusquedaHonorarios($params){
        $servicios = null;
        if(!empty($_POST['valor']) && !empty($_POST['honorario'])){ //REVISA QUE ESTEN SETEADOS LOS VALORES PARA BUSCAR
            $valor = $_POST['valor'];
            $honorario = $_POST['honorario'];
            if($valor == "mayor"){
                $servicios =$this->Smodel->BuscarHonorarioMayor($honorario);
            }else{
                $servicios =$this->Smodel->BuscarHonorarioMenor($honorario);
            }

            if($servicios){// SI SE ENCONTRARON VALORES PARA $SERVICIOS ENTRA
                $this->view->ShowBusquedas($servicios);
            }else{
                $msg= "NO SE ENCONTRARON RESULTADOS";
                $this->view->ShowBusquedas($servicios, $msg);
            }
        }

        else{
            $msg= "COMPLETE TODOS LOS CAMPOS";
            $this->view->ShowBusquedas($servicios, $msg);
        }


    }


}


?>