<?php

class JSONView {

   
    // Responde cualquier coleccion de objetos en formato JSON.
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1". $status." ". $this->_requestStatus($status));
        echo json_encode($data);
    }

    
    //Asocia un mensaje a una respuesta.
    private function _requestStatus($code){
        $status = array(
          200 => "OK",
          305 => "RESPUESTA VACIA",
          401 => "USUARIO NO AUTORIZADO",
          404 => "NO ENCONTRADO",
          500 => "ERROR INTERNO DEL SERVER"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
      }
  
}