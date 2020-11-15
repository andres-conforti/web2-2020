<?php

  include_once 'helpers/dbHelper.php';
  
  class UserModel{
  
    private $db;
    private $dbHelper;
  
    function __construct() {
      $this->dbHelper = new DBHelper();
      $this->db = $this->dbHelper->connect();
      }
      
    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM user WHERE email = ?');
        $query->execute(array($email));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAllUsers(){
        $query = $this->db->prepare('SELECT id, email, isAdmin FROM user ');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function addUsuario($email,$pass){
        $sentencia = $this->db->prepare("INSERT INTO user(email,pass) VALUES(?,?)");
        $sentencia->execute(array($email,$pass));
    }

    function EditUsuario($isAdmin,$id){
        $sentencia = $this->db->prepare("UPDATE user SET isAdmin=? WHERE id=?");
        $sentencia->execute(array($isAdmin,$id));
    }
  
    function borrarUsuario($id){
      $sentencia = $this->db->prepare("DELETE FROM user WHERE id=?");
      $sentencia->execute(array($id));
    }

}
?>