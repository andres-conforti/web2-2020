<?php
    require_once 'app/Controller/Controller.php';
    require_once 'app/Controller/authController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
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


    //Esto lo veo en TasksView
    //$r->addRoute("insert", "POST", "Controller", "InsertTask");
    //$r->addRoute("delete/:ID", "GET", "Controller", "BorrarLaTaskQueVienePorParametro");
    //$r->addRoute("completar/:ID", "GET", "Controller", "MarkAsCompletedTask");



    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>