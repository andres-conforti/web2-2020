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

      function GetCategorias(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCategoria($id){
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id=?");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);  // revisar si esta bien . solo traigo 1, no all.
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
      
}

?>