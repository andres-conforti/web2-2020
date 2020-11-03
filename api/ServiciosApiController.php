<?php
class serviciosApiController extends apiController {    
    
    public function __construct() {  
        parent::__construct();        
        $this->model = new ServiciosModel();     
    }
}
;