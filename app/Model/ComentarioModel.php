<?php

    class ComentarioModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=estudio_perez;charset=utf8', 'root', '');
        }
        
        function addComentario($id_servicio,$comentario,$puntaje,$id_user){
            $sentencia = $this->db->prepare('INSERT INTO comentario(id_servicio,comentario,puntaje,id_user) VALUES (?,?,?,?)');
            $sentencia->execute(array($id_servicio,$comentario,$puntaje,$id_user));
        }

        function getcomentarios(){
            $sentencia = $this->db->prepare('SELECT * FROM comentario');
            $sentencia->execute(array());
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } 

        function getComentario($id){
            $sentencia = $this->db->prepare('SELECT id, comentario, puntaje, usuario AS nombreUsuario from user inner join comentario 
                    on user.id = comentario.id_usuario  WHERE id_servicio = ? order by id desc');
            $sentencia->execute(array($id));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function getIdComentario($id){
            $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE id = ?');
            $sentencia->execute(array($id));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function borraComentario($id){
            $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
            $sentencia->execute(array($id));
        }
    }