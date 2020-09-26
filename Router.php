<?php
    require_once 'Controller/Controller.php';
    require_once 'RouterClass.php';
    //require_once 'Controller/TasksAdvanceController.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("login", "GET", "Controller", "Login");
    $r->addRoute("servicios", "GET", "Controller", "Servicios");
    $r->addRoute("servicios/:ID", "GET", "Controller", "ServicioDetalle");
    //$r->addRoute("faq", "GET", "Controller", "Faq");
    //$r->addRoute("contacto", "GET", "Controller", "Contacto");
    //$r->addRoute("//", "GET", "Controller", "Contacto");

    //Esto lo veo en TasksView
    //$r->addRoute("insert", "POST", "Controller", "InsertTask");
    //$r->addRoute("delete/:ID", "GET", "Controller", "BorrarLaTaskQueVienePorParametro");
    //$r->addRoute("completar/:ID", "GET", "Controller", "MarkAsCompletedTask");

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>