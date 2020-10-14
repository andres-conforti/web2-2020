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
    
    
    $r = new Router();

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("login", "GET", "authController", "Login");
    $r->addRoute("logout", "GET", "authController", "logout");
   
    $r->addRoute("verificar", "POST", "authController", "verifyLogin");
    
    $r->addRoute("faq", "GET", "Controller", "Faq");
    $r->addRoute("contacto", "GET", "Controller", "Contacto");
   
    $r->addRoute("servicios", "GET", "Controller", "Servicios");
    $r->addRoute("infoServicio/:ID", "GET", "Controller", "ServicioDetalle");

    $r->addRoute("filtrar", "POST", "Controller", "CategoriaDetalle");

    $r->addRoute("borrarCategoria/:ID", "GET", "admController", "borrarCategoria");
    $r->addRoute("editarCategoria/:ID", "GET", "admController", "editarCategoria"); // view de editar
    $r->addRoute("editCategoria/:ID", "POST", "admController", "editCategoria"); // llamado a editar de lo anterior

    $r->addRoute("borrarServicio/:ID", "GET", "admController", "borrarServicio");
    $r->addRoute("editarServicio/:ID", "GET", "admController", "editarServicio"); // view de editar
    $r->addRoute("editServicio/:ID", "POST", "admController", "editServicio"); // llamado a editar de lo anterior
    
    $r->addRoute("agregarServicio", "GET", "admController", "addServicio"); // view
    $r->addRoute("nuevoServicio", "POST", "admController", "newServicio"); // funcion
    $r->addRoute("agregarCategoria", "GET", "admController", "addCategoria"); // view
    $r->addRoute("nuevaCategoria", "POST", "admController", "newCategoria"); // funcion

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>