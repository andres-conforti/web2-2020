<?php
class comentariosApiController extends apiController {    
    
    public function __construct() {  
        parent::__construct();        
        $this->model = new ComentariosModel();     
    }
}
;