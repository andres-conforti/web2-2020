<?php

require_once ("app/View/TasksView.php");
require_once ("app/Model/UserModel.php");
require_once ('helpers/authHelper.php');

class authController{

    private $view;
    private $model;
    private $authHelper;
    
    public function __construct(){
        $this->view = new TasksView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
       

    }
    public function Login() {
        $this->view->ShowLogin();
      
    }

    function Register(){
      $this->view->ShowRegister();
    }

    public function verifyLogin() {
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
        //echo "<br>".$user."<br>";
        if ($user && password_verify($password, $user->pass)) {
            $this->authHelper->login($user);
            header('Location: ' . BASE_URL);
        } else {
            echo "acceso denegado";
        }

        
    }
    public function logout() {
        $this->authHelper->logout();
        header('Location: ' . LOGIN);
    }
}


?>