<?php
    require_once 'app/Controller/Controller.php';
    require_once 'app/Controller/authController.php';
    require_once 'RouterClass.php';
    //require_once 'Controller/TasksAdvanceController.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("login", "GET", "authController", "Login");
    $r->addRoute("verificar", "POST", "authController", "loginUser");
    $r->addRoute("register", "GET", "authController", "Register");
    $r->addRoute("faq", "GET", "Controller", "Faq");
    $r->addRoute("contacto", "GET", "Controller", "Contacto");
    $r->addRoute("servicios", "GET", "Controller", "Servicios");
    $r->addRoute("infoServicio/:ID", "GET", "Controller", "ServicioDetalle");


    //Esto lo veo en TasksView
    //$r->addRoute("insert", "POST", "Controller", "InsertTask");
    //$r->addRoute("delete/:ID", "GET", "Controller", "BorrarLaTaskQueVienePorParametro");
    //$r->addRoute("completar/:ID", "GET", "Controller", "MarkAsCompletedTask");



    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>