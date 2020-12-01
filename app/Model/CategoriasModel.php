<?php

include_once 'helpers/dbHelper.php';

class CategoriasModel{

  private $db;
  private $dbHelper;

  function __construct() {
    $this->dbHelper = new DBHelper();
    $this->db = $this->dbHelper->connect();
    }
         
    function GetCategorias(){
      $sentencia = $this->db->prepare("SELECT * FROM categoria");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCategoria($id){
      $sentencia = $this->db->prepare( "SELECT * from categoria where id=?");
      $sentencia->execute([$id]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    
    //PIDE TODOS DE CATEGORIAS, MIENTRAS QUE ESTE ENTRE LOS LIMITES Y OFFSETS DE LA PAGINA ACTUAL, Y LOS ORDENA POR ID DE MENOR A MAYOR 
      function GetCategoriasPaginadas($limit,$offset){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria ORDER BY categoria.id ASC LIMIT $offset,$limit");
        $sentencia->execute([$limit,$offset]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);  
      }

        

    //administrar
    function EditarCategoria($nombre,$imagen,$id){
    $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?,img=? WHERE id=?");
    $sentencia->execute(array($nombre,$imagen,$id));
    }

    function borrarCategoria($id){
      $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
      $sentencia->execute(array($id));
    }

    function InsertCategoria($nombre,$imagen){
      $sentencia = $this->db->prepare("INSERT INTO categoria(nombre,img) VALUES(?,?)");
      $sentencia->execute(array($nombre,$imagen));
    } 
    function borrarImg($id){
      $sentencia = $this->db->prepare("DELETE img FROM categoria WHERE id=?");
      $sentencia->execute(array($id));
    }
    

}

?>