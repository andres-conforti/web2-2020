<?php

    class ComentarioModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=estudio_perez;charset=utf8', 'root', '');
        }

        function addComentario($comentario,$puntaje,$id_user,$id_servicio){ // agrega un comentario
            $sentencia = $this->db->prepare('INSERT INTO comentario(comentario,puntaje,id_user,id_servicio) VALUES (?,?,?,?)');
            $sentencia->execute(array($comentario,$puntaje,$id_user,$id_servicio));
        }

        function getIdComentarios($id){ //trae todos los comentarios de un servicio
            $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE id_servicio = ?');
            $sentencia->execute(array($id));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function borraComentario($id){ // borra un comentario
            $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id=?');
            $sentencia->execute(array($id));
        }
    }