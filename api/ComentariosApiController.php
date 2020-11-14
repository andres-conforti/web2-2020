<?php

require_once 'api/apiController.php';
require_once 'api/jsonView.php';

class comentariosApiController extends ApiController {    
    
    function __construct(){
        parent::__construct();
    }

    function addComentario($params = null) {
        $body = $this->getData();
        $this->model->addComentario($body->id, $body->comentario, $body->puntaje, $body->id_user);
        var_dump($body);
        $this->view->response("El comentario se agrego con exito", 200);    
    }

    function getComentarios($params = null){
        $comentarios = $this->model->getComentarios();
        if($comentarios != null){
            if ($comentarios) {
                $this->view->response($comentarios, 200);   
            } else {
                $this->view->response("No existe la tarea con el id=$id", 404);
            }
        }
    }

    function getComentario($params = null){
        $id = $params[':ID'];
        $comentarios = $this->model->getComentario($id);
        if($comentarios != null){
            if ($comentarios) {
                $this->view->response($comentarios, 200);   
            } else {
                $this->view->response("No existe la tarea con el id=$id", 404);
            }
        }
    }

    function deleteComentario($params = []){
        $id = $params[':ID'];
        $comentarios = $this->model->getIdComentario($id);
        if ($comentarios) {
            $this->model->borraComentario($id);
            $this->view->response("comentario id=$id eliminado con éxito", 200);
        }
        else 
            $this->view->response("comentarios id=$id not found", 404);
    }
}