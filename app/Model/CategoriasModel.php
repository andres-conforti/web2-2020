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
   
    
//SELECT column_list FROM table1 ORDER BY column_list LIMIT row_count OFFSET offset;

      function GetCategoriasPaginadas($limit,$offset){
        $sentencia = $this->db->prepare( "SELECT * FROM (SELECT * FROM categoria LIMIT 4 OFFSET 0) as categorias LEFT JOIN servicio as servicios on servicios.id_categoria_fk = categorias.id ORDER BY categorias.id ASC");
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

    

}

?>