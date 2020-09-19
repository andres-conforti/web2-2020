<?php

class TasksModel{

    private $db;

    // REVISAR QUE TENGA CONTRASEÑA "ROOT"

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=estudio_perez;charset=utf8', 'root', '');
    }
         
      function GetServicio(){
          $sentencia = $this->db->prepare("SELECT * FROM servicio");
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
      }

      function GetProfesional(){
        $sentencia = $this->db->prepare("SELECT * FROM profesional");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
      
      function InsertProfesional($nombre,$matricula,$imagen){
          $sentencia = $this->db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
          $sentencia->execute(array($title,$description,$completed,$priority));
      }
      
      function DeleteProfesional($task_id){
          $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
          $sentencia->execute(array($task_id));
      }
      
      //id:1 nombre:roberto mat:123;

      //nombre:roberto mat:123;

      function EditProfesional($id,$nombre,$matricula,$imagen){
          $sentencia = $this->db->prepare("UPDATE profesional SET nombre=1 WHERE id=?");
          $sentencia->execute(array($task_id));
      
      }
      
}

?>