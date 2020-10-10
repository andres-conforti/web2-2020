<?php

class TasksModel{

    private $db;

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
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getServiciosConCategoria($id){
      $sentencia = $this->db->prepare( "SELECT servicio.*, categoria.nombre as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE categoria.id = ? ");
      $sentencia->execute([$id]);
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getAll() {
      $sentencia = $db->prepare("SELECT servicio.*, categoria.nombre as categorias FROM servicio JOIN categorias ON servicio.id_categoria_fk = categoria.id");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


      function GetCategorias(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function ShowFiltradoCategoria($id){
      $sentencia = $this->db->prepare( "SELECT * from servicio where id_categoria_fk=?");
      $sentencia->execute([$id]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetCategoria($id){
      $sentencia = $this->db->prepare( "SELECT * from categoria where id=?");
      $sentencia->execute([$id]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetServicioFiltrado($id){ // comparar con el GetServicio fk
      $sentencia = $this->db->prepare("SELECT * FROM categoria, servicio WHERE servicio.id=categoria.id_categoria_fk");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
      }
   






      
    function DeleteServicio($id){
        $sentencia = $this->db->prepare("DELETE FROM servicio WHERE id=?");
        $sentencia->execute(array($id));
    }
      


    function EditServicio($nombre,$descripcion,$honorarios,$id_categoria_fk,$id){
        $sentencia = $this->db->prepare("UPDATE servicio SET nombre=?,descripcion=?,honorarios=?,id_categoria_fk=? WHERE id=?");
        $sentencia->execute(array($nombre,$descripcion,$honorarios,$id_categoria_fk,$id));
    }


    function EditarCategoria($id,$nombre,$imagen){
    $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?,img=? WHERE id=?");
    $sentencia->execute(array($id,$nombre,$imagen));
    }

    function borrarServicio($id){
      $sentencia = $this->db->prepare("DELETE FROM servicio WHERE id=?");
      $sentencia->execute(array($id));
    }

    function borrarCategoria($id){
      $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
      $sentencia->execute(array($id));
    }

    function InsertServicio($nombre,$categoria,$honorarios,$descripcion){
      $sentencia = $this->db->prepare("INSERT INTO servicio(nombre,id_categoria_fk,honorarios,descripcion) VALUES(?,?,?,?)");
      $sentencia->execute(array($nombre,$categoria,$honorarios,$descripcion));
    }

    function InsertCategoria($nombre,$imagen){
      $sentencia = $this->db->prepare("INSERT INTO categoria(nombre,img) VALUES(?,?)");
      $sentencia->execute(array($nombre,$imagen));
    } 

    

}

?>