<?php
    require_once 'app/Controller/Controller.php';
    require_once 'app/Controller/authController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("SERVICIOS", BASE_URL . 'servicios');
    
    $r = new Router();

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("login", "GET", "authController", "Login");
    $r->addRoute("logout", "GET", "authController", "logout");
   
    $r->addRoute("verificar", "POST", "authController", "verifyLogin");
    
    $r->addRoute("register", "GET", "authController", "Register");
    
    $r->addRoute("faq", "GET", "Controller", "Faq");
    $r->addRoute("contacto", "GET", "Controller", "Contacto");
   
    $r->addRoute("servicios", "GET", "Controller", "Servicios");
    $r->addRoute("infoServicio/:ID", "GET", "Controller", "ServicioDetalle");

    $r->addRoute("filtrar", "POST", "Controller", "CategoriaDetalle");

    $r->addRoute("administrar", "GET", "Controller", "Administrar");

    //$r->addRoute("insert", "POST", "Controller", "InsertTask");
    $r->addRoute("borrarCategoria/:ID", "GET", "Controller", "borrarCategoria");
    $r->addRoute("editarCategoria/:ID", "GET", "Controller", "editarCategoria"); // view de editar
    $r->addRoute("editCategoria/:ID", "POST", "Controller", "editCategoria"); // llamado a editar de lo anterior

    $r->addRoute("borrarServicio/:ID", "GET", "Controller", "borrarServicio");
    $r->addRoute("editarServicio/:ID", "GET", "Controller", "editarServicio"); // view de editar
    $r->addRoute("editServicio/:ID", "POST", "Controller", "editServicio"); // llamado a editar de lo anterior
    
    $r->addRoute("agregarServicio", "GET", "Controller", "addServicio"); // view
    $r->addRoute("nuevoServicio", "POST", "Controller", "newServicio"); // funcion
    $r->addRoute("agregarCategoria", "GET", "Controller", "addCategoria"); // view
    $r->addRoute("nuevaCategoria", "POST", "Controller", "newCategoria"); // funcion


    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>