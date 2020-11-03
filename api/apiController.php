<?php

abstract class ApiController {     
    protected $model; // lo instancia el hijo     
    protected $view;
    private $data; //De esta manera esta disponible siempre que queremos usarlo     
    
    public function __construct() {         
        $this->view = new APIView();         
        $this->data = file_get_contents("php://input");     
    }

    function getData(){         
        return json_decode($this->data);
    }
}
;