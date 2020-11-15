<?php
    require_once('Router.php');
    require_once('api/ComentariosApiController.php');
    

    define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("comentarios", "GET", "ComentariosApiController", "getComentarios");
    $router->addRoute("comentarios", "POST", "comentariosApiController", "addComentario");
    $router->addRoute("comentarios/:ID", "DELETE", "comentariosApiController", "deleteComentario");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 