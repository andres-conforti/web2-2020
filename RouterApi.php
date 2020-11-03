<?php
    require_once('Router.php');
    require_once('./api/ServiciosApi.php');
    require_once('./api/ComentariosApi.php');
    

    define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("/servicio", "GET", "ServiciosApi", "getServicios");
    $router->addRoute("/servicio/:id", "GET", "ServiciosApi", "getServicio");


    $router->addRoute("/comentario/:id_categoria", "POST", "ComentariosApi", "insertarComentario");
    $router->addRoute("/comentarios/:id_comentario/", "DELETE", "ComentariosApi", "borrarComentario");

    $router->addRoute("/comentarios/:id_categoria/puntajeprom/", "GET", "ComentariosApi", "getPromPuntaje");


    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 