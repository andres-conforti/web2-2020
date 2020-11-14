<?php

class Paginacion{

function Paginar($valor,$maxPaginas,$id){
        $maximo = count($valor);

        if(isset($id)){
            $paginaActual = $id;
        } 
    else{
        $paginaActual = 1;
    }
    $count = ceil($maximo/$maxPaginas);
    $param1 = ($paginaActual-1)*$maxPaginas;
    $this->categorias = array_slice($valor,$param1,$maxPaginas);

    for($x=1;$x<=$count;$x++){
        $numeros[]=$x;
    }

    return $numeros;
}

function fetchResult(){
    $resultados = $this->categorias;
    return $resultados;
}

}//fin






