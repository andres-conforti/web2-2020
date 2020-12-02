<?php

require_once 'helpers/dbHelper.php';
  
  class ServiciosModel{
  
    private $db;
    private $dbHelper;
  
    function __construct() {
      $this->dbHelper = new DBHelper();
      $this->db = $this->dbHelper->connect();
      }
  

  //SE UTILIZA PARA EL FILTRO POR CATEGORIA
  function GetDetalleServicios($id){
    $sentencia = $this->db->prepare( "SELECT servicio.*, categoria.img, categoria.nombre as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE categoria.id = ? ");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  //PARA VER LOS DETALLES DEL SERVICIO Y SU CATEGORIA
 function getServicioConCategoria($id){
    $sentencia = $this->db->prepare("SELECT servicio.*, categoria.nombre as categoria FROM servicio JOIN categoria ON servicio.id_categoria_fk = categoria.id WHERE servicio.id = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_OBJ);
  }

  //SE UTILIZA PARA LA PAGINACION
  //PIDE NOMBRE ID ID_categoria_fk DE TODOS LOS SERVICIOS MIENTRAS QUE ESTEN ENTRE LOS LIMITES Y OFFSETS DE LA PAGINA ACTUAL Y LOS ORDENA X ID DE MENOR A MAYOR
  function GetServiciosPaginados($limit,$offset){
    $sentencia = $this->db->prepare( "SELECT servicios.nombre, servicios.id, servicios.id_categoria_fk as idFk
     FROM (SELECT * FROM categoria LIMIT $offset,$limit) as categorias INNER JOIN servicio as servicios
      on servicios.id_categoria_fk = categorias.id ORDER BY id ASC");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }



  //SE UTILIZA PARA EDITAR SERVICIO
  function GetServicio($id){
    $sentencia = $this->db->prepare( "SELECT * from servicio where id=?");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_OBJ);
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