<?php
require_once 'api/jsonView.php';
require_once 'app/Model/ComentarioModel.php';
require_once 'api/ApiController.php';


class ComentariosApiController extends ApiController {

    function __construct() {
        parent::__construct();
        $this->model = new ComentarioModel();
    }

    public function getTodosLosComentarios($params = null) {
        $parametros = [];
        $tasks = $this->model->getTodosLosComentarios($parametros);
        $this->view->response($tasks, 200);
    }

    

    public function getComentariosServicio($params = null) {
        
        
        $idServicio = $params[':ID'];
        $comentarios = $this->model->getComentariosServicio($idServicio);
        if ($comentarios)
            $this->view->response($comentarios, 200);
        else
            $this->view->response(null, 404);
    }

    public function deleteComentario($params = null) {
        $idTask = $params[':ID'];
        $success = $this->model->deleteComentario($idTask);
        if ($success > 0) {
            $this->view->response("La tarea con el id=$idTask se borró exitosamente", 200);
        }
        else { 
            $this->view->response("La tarea con el id=$idTask no existe", 404);
        }
    }

    public function addComentario($params = null) {
        $body = $this->getData();
        
        $id = $this->model->addComentario($body->id_servicio,$body->id_user,$body->texto,$body->puntaje);

        if (!empty($id)) {
            $this->view->response($id, 201);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }

    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

}
