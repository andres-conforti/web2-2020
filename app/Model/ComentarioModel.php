<?php
require_once 'helpers/dbHelper.php';

class ComentarioModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function getComentariosServicio($id) {
        $sentencia = $this->db->prepare("SELECT comentario.*, user.email as usuario FROM comentario JOIN user ON comentario.id_user = user.id WHERE comentario.id_servicio = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    function addComentario($id_servicio,$id_user,$texto,$puntaje) {
        $sentencia = $this->db->prepare('INSERT INTO comentario(id_servicio,id_user,texto,puntaje) VALUES (?,?,?,?)');
        $sentencia->execute(array($id_servicio,$id_user,$texto,$puntaje));
        return $this->db->lastInsertId();
    }

    function deleteComentario($id) {  
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id=?');
        $sentencia->execute([$id]);
        return $sentencia->rowCount();
  }
}