<?php

require_once 'app/model/comentarioModel.php';

abstract class ApiController {

    protected $comentariosModel;
    protected $view;
    protected $model;

    private $data;
    
    public function __construct() {
        $this->model = new ComentarioModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");    
    }

    public function getData(){
        return json_decode($this->data);
    }
}