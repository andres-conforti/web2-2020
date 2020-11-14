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
    $sentencia = $this->db->prepare("SELECT servicio.*, categoria.nombre as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE servicio.id = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_OBJ);
  }

  function getServiciosConCategoria($id){
    $sentencia = $this->db->prepare( "SELECT servicio.*, categoria.img, categoria.nombre as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE categoria.id = ? ");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  function getServiciosConCategoriaTODOS(){
    $sentencia = $this->db->prepare( "SELECT servicio.*, categoria.img, categoria.nombre as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  function EditServicio($nombre,$descripcion,$honorarios,$id_categoria_fk,$id){
      $sentencia = $this->db->prepare("UPDATE servicio SET nombre=?,descripcion=?,honorarios=?,id_categoria_fk=? WHERE id=?");
      $sentencia->execute(array($nombre,$descripcion,$honorarios,$id_categoria_fk,$id));
  }

  function InsertServicio($nombre,$categoria,$honorarios,$descripcion){
    $sentencia = $this->db->prepare("INSERT INTO servicio(nombre,id_categoria_fk,honorarios,descripcion) VALUES(?,?,?,?)");
    $sentencia->execute(array($nombre,$categoria,$honorarios,$descripcion));
  }

  function borrarServicio($id){
    $sentencia = $this->db->prepare("DELETE FROM servicio WHERE id=?");
    $sentencia->execute(array($id));
  }

  function BuscarServicio($id){
    $sentencia = $this->db->prepare( "SELECT * FROM servicio WHERE descripcion LIKE '%$id%' OR nombre LIKE '%$id%'");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  function BuscarHonorarioMayor($id){
    $sentencia = $this->db->prepare( "SELECT * from servicio WHERE honorarios > ? ");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  function BuscarHonorarioMenor($id){
    $sentencia = $this->db->prepare( "SELECT * from servicio WHERE honorarios < ?  ");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
    

}

?>