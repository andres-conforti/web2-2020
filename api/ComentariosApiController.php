<?php
class comentariosApiController extends apiController {    
    
    public function __construct() {  
        parent::__construct();        
        $this->model = new ComentariosModel();     
    }
    
    function addComentario($params = null) {
        $body = $this->getData();
    $this->model->addComentario(/*$body->id_cerveza, $body->texto, $body->puntaje, $body->id_usuario,$valor, $orden*/);
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
;