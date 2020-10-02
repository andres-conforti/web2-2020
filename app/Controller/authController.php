<?php

require_once "app/View/TasksView.php";
require_once "app/Model/UserModel.php";

class authController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new TasksView();
        $this->model = new UserModel();

    }
    public function Login() {
        $this->view->ShowLogin();
    }

    //function Register(){
      //  $this->view->ShowRegister();
    //}

    public function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        // verifico campos obligatorios
        if (empty($email) || empty($password)) {
            echo "Faltan datos obligatorios";
            die();
        }

        // obtengo el usuario
        $user = $this->model->getByEmail($email);

        // si el usuario existe, y las contraseñas coinciden
        if ($user && password_verify($password, $user->pass)) {
            echo "acceso exitoso";
        } else {
            echo "acceso denegado";
        }

        
    }
}


?>