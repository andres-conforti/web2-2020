<?php
include_once 'helpers/db.helper.php';

class ComentarioModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
         // 1. Abro la conexión
        $this->db = $this->dbHelper->connect();
    }


   //Devuelve todas las tareas de la base de datos.
    function getComentarios($parametros = null) {
        $sentencia = $this->db->prepare("SELECT * FROM comentario");
        $sentencia->execute();
        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        return $sentencia->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas
    }

    function getComentario($id) {
        $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE id=?');
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    //Inserta la tarea en la base de datos
    function addComentario($idServicio,$idUsuario,$comentario,$puntaje) {
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $sentencia = $this->db->prepare('INSERT INTO comentario(id_servicio,id_user,comentario,puntaje) VALUES (?,?,?,?)');
        $sentencia->execute(array($idServicio,$idUsuario,$comentario,$puntaje));
        // 3. Obtengo y devuelo el ID de la tarea nueva
        return $this->db->lastInsertId();
    }

    function deleteComentario($id) {  
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id=?');
        $sentencia->execute([$id]);
        return $sentencia->rowCount();
  }
}