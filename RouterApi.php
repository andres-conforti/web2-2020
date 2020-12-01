<?php
    require_once('RouterClass.php');
    require_once('api/ComentariosApiController.php');
    

    define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // trae todos los comentarios de ese servicio
    $router->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "getComentariosServicio");

    // agrega un nuevo comentario
    $router->addRoute("comentarios", "POST", "ComentariosApiController", "addComentario");

    // elimina un comentario
    $router->addRoute("comentarios/:ID", "DELETE", "comentariosApiController", "deleteComentario");

    
    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 