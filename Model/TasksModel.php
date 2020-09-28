<?php

class TasksModel{

    private $db;

    // REVISAR QUE TENGA CONTRASEÑA "ROOT"

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=estudio_perez;charset=utf8', 'root', '');
    }
         
    function GetServicios(){
        $sentencia = $this->db->prepare("SELECT * FROM servicio");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
      }

    function GetServicio($id){
        $sentencia = $this->db->prepare( "SELECT * from servicio where id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

      function GetCategorias(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCategoria($id){ // comparar con el GetServicio
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id=?");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
 
    function InsertServicio($nombre,$descripcion,$honorario){
        $sentencia = $this->db->prepare("INSERT INTO servicio(nombre,descripcion,honorario) VALUES(?,?,?)");
        $sentencia->execute(array($nombre,$descripcion,$honorario));
    }
      
    function DeleteServicio($id){
        $sentencia = $this->db->prepare("DELETE FROM servicio WHERE id=?");
        $sentencia->execute(array($id));
    }
      
    function EditServicio($id,$nombre,$descripcion,$honorario){
        $sentencia = $this->db->prepare("UPDATE servicio SET nombre=?,descripcion=?,honorario=? WHERE id=?");
        $sentencia->execute(array($id,$nombre,$descripcion,$honorario));
    }

    function InsertCategoria($nombre,$imagen){
      $sentencia = $this->db->prepare("INSERT INTO categoria(nombre,img) VALUES(?,?,?)");
      $sentencia->execute(array($nombre,$imagen));
    }  

    function DeleteCategoria($id){
      $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
      $sentencia->execute(array($id));
    }

    function EditCategoria($id,$nombre,$imagen){
      $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?,img=? WHERE id=?");
      $sentencia->execute(array($id,$nombre,$imagen));
  }
}

?>