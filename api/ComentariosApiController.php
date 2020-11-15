<?php
require_once 'api/apiController.php';
require_once 'api/jsonView.php';
require_once 'app/Model/ComentarioModel.php';


class ApiTaskController {

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

    public function getComentarios($params = null) {
        $parametros = [];

        $tasks = $this->model->getAll($parametros);
        $this->view->response($tasks, 200);
    }

    public function getComentario($params = null) {
        // $params es un array asociativo con los parámetros de la ruta
        $idTask = $params[':ID'];
        $task = $this->model->get($idTask);
        if ($task)
            $this->view->response($task, 200);
        else
            $this->view->response("La tarea con el id=$idTask no existe", 404);
    }

    public function deleteComentario($params = null) {
        $idTask = $params[':ID'];
        $success = $this->model->remove($idTask);
        if ($success) {
            $this->view->response("La tarea con el id=$idTask se borró exitosamente", 200);
        }
        else { 
            $this->view->response("La tarea con el id=$idTask no existe", 404);
        }
    }

    public function addComentario($params = null) {

        $body = $this->getData();

        $titulo       = $body->titulo;
        $descripcion  = $body->descripcion;
        $prioridad    = $body->prioridad;

        $id = $this->model->insert($titulo, $descripcion, $prioridad);

        if ($id > 0) {
            $task = $this->model->get($id);
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