<?php

class ServiciosModel{

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

    function getServicioConCategoria($id){
      $sentencia = $this->db->prepare( "SELECT servicio.*, categoria.nombreC as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE servicio.id = ? ");
      $sentencia->execute([$id]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getServiciosConCategoria($id){
      $sentencia = $this->db->prepare( "SELECT servicio.*, categoria.nombreC, categoria.img as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE categoria.id = ? ");
      $sentencia->execute([$id]);
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
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
   
    function DeleteServicio($id){
        $sentencia = $this->db->prepare("DELETE FROM servicio WHERE id=?");
        $sentencia->execute(array($id));
    }
  
    function EditServicio($nombre,$descripcion,$honorarios,$id_categoria_fk,$id){
        $sentencia = $this->db->prepare("UPDATE servicio SET nombre=?,descripcion=?,honorarios=?,id_categoria_fk=? WHERE id=?");
        $sentencia->execute(array($nombre,$descripcion,$honorarios,$id_categoria_fk,$id));
    }

    function EditarCategoria($nombre,$imagen,$id){
    $sentencia = $this->db->prepare("UPDATE categoria SET nombreC=?,img=? WHERE id=?");
    $sentencia->execute(array($nombre,$imagen,$id));
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
      $sentencia = $this->db->prepare("INSERT INTO categoria(nombreC,img) VALUES(?,?)");
      $sentencia->execute(array($nombre,$imagen));
    } 

    

}

?>