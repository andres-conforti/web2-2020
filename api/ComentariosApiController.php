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
            $this->view->response( $id, 201);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }

    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

}

?>