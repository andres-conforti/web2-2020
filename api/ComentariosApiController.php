<?php
require_once 'api/jsonView.php';
require_once 'app/Model/ComentarioModel.php';


class ComentariosApiController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ComentarioModel();
        $this->view = new jsonView();
        $this->data = file_get_contents("php://input");
    }

    // Lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData(){ 
        return json_decode($this->data); 
    } 

    public function getTodosLosComentarios($params = null) {
        $parametros = [];
        $tasks = $this->model->getTodosLosComentarios($parametros);
        $this->view->response($tasks, 200);
    }

    

    public function getComentariosServicio($params = null) {
        // $params es un array asociativo con los parámetros de la ruta
        $idServicio = $params[':ID'];
        $comentarios = $this->model->getComentariosServicio($idServicio);
        //id:1
        //comentario:comentario de prueba
        //puntaje:5
        //id_user:1
        //id_servicio:1
        //user:admin
        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response("El servicio con el id=$idServicio no existe", 404);
    }

    public function deleteComentario($params = null) {
        $idTask = $params[':ID'];
        $success = $this->model->deleteComentario($idTask);
        if ($success) {
            $this->view->response("La tarea con el id=$idTask se borró exitosamente", 200);
        }
        else { 
            $this->view->response("La tarea con el id=$idTask no existe", 404);
        }
    }

    public function addComentario($params = null) {

        $body = $this->getData();
        
        $idServicio = $body->idServicio;
        $idUsuario  = $body->idUsuario;
        $comentario = $body->comentario;
        $puntaje    = $body->puntaje;

        $id = $this->model->addComentario($idServicio,$idUsuario,$comentario,$puntaje);

        if ($id > 0) {
            $task = $this->model->getComentario($id);
            $this->view->response($task, 200);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }

    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

}

