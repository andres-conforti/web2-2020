<?php
    require_once 'app/Controller/Controller.php';
    require_once 'app/Controller/admController.php';
    require_once 'app/Controller/authController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("LOGOUT", BASE_URL . 'logout');
    define("SERVICIOS", BASE_URL . 'servicios');
    define("ADM", BASE_URL . 'administrar');
    define("REGISTER", BASE_URL . 'registrar');
    define("EDITAR", BASE_URL . 'editarCategoria');
    
    
    $r = new Router();

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    // Auths
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("login", "GET", "authController", "Login");
    $r->addRoute("logout", "GET", "authController", "logout");
    $r->addRoute("registrar", "GET", "authController", "registrar");//vista de registrar
    $r->addRoute("registrarse", "POST", "authController", "registracion");//func de registrar
    $r->addRoute("verificar", "POST", "authController", "verifyLogin");
   
    //Servicios
    $r->addRoute("servicios/:ID", "GET", "Controller", "Servicios");
    $r->addRoute("servicios", "GET", "Controller", "Servicios");
    $r->addRoute("infoServicio/:ID", "GET", "Controller", "ServicioDetalle");
    $r->addRoute("filtrar", "POST", "Controller", "CategoriaDetalle");
    $r->addRoute("buscarServicio", "POST", "Controller", "BusquedaServicios");
    $r->addRoute("buscarHonorario", "POST", "Controller", "BusquedaHonorarios");

   //ADMINISTRACION
    $r->addRoute("administrar", "GET", "admController", "administracion");
    $r->addRoute("editarPermisos", "POST", "admController", "editPermisos");
    $r->addRoute("borrarUsuario", "POST", "admController", "deleteUser");

    //ABM Categorias

        //Alta
        $r->addRoute("agregarCategoria", "GET", "admController", "addCategoria"); // view
        $r->addRoute("nuevaCategoria", "POST", "admController", "newCategoria"); // funcion

        //Baja
        $r->addRoute("borrarCategoria/:ID", "GET", "admController", "borrarCategoria");
        $r->addRoute("borrarImg/:ID", "POST", "admController", "borrarImg"); // funcion


        //Modificacion
        $r->addRoute("editarCategoria/:ID", "GET", "admController", "editarCategoria"); // view
        $r->addRoute("editCategoria/:ID", "POST", "admController", "editCategoria"); // funcion


    //ABM Servicios

        //Alta
        $r->addRoute("agregarServicio", "GET", "admController", "addServicio"); // view
        $r->addRoute("nuevoServicio", "POST", "admController", "newServicio"); // funcion

        //Baja
        $r->addRoute("borrarServicio/:ID", "GET", "admController", "borrarServicio");

        //Modificacion
        $r->addRoute("editarServicio/:ID", "GET", "admController", "editarServicio"); // view
        $r->addRoute("editServicio/:ID", "POST", "admController", "editServicio"); // funcion

    //Otros
    $r->addRoute("faq", "GET", "Controller", "Faq");
    $r->addRoute("contacto", "GET", "Controller", "Contacto");
    
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>