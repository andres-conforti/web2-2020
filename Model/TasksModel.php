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

      function GetProfesionales(){
        $sentencia = $this->db->prepare("SELECT * FROM profesional");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetProfesional($id){
        $sentencia = $this->db->prepare("SELECT * FROM profesional WHERE id=?");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);  // revisar si esta bien . solo traigo 1, no all.
    }
      
      function InsertProfesional($nombre,$matricula,$imagen){
          $sentencia = $this->db->prepare("INSERT INTO profesional(nombre,matricula,imagen) VALUES(?,?,?)");
          $sentencia->execute(array($nombre,$matricula,$imagen));
      }
      
      function DeleteProfesional($id){
          $sentencia = $this->db->prepare("DELETE FROM profesional WHERE id=?");
          $sentencia->execute(array($id));
      }
      
      function EditProfesional($id,$nombre,$matricula,$imagen){
          $sentencia = $this->db->prepare("UPDATE profesional SET nombre=?,matricula=?,imagen=? WHERE id=?");
          $sentencia->execute(array($id,$nombre,$matricula,$imagen));
      }
      
}

?>