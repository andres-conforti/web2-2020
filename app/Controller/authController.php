<?php

require_once ("app/View/ServiciosView.php");
require_once ("app/Model/UserModel.php");
require_once ('helpers/authHelper.php');


class authController{

    private $view;
    private $model;
    private $authHelper;
    
    public function __construct(){
        $this->view = new ServiciosView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    public function Login() {
        $this->view->ShowLogin();
    }

    public function verifyLogin() {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        // verifico campos obligatorios
        if (empty($email) || empty($password)) {
            $msg = " DATOS FALTANTES ";
            $this->view->ShowLogin($msg);
            die();
        }

        // obtengo el usuario
        $user = $this->model->getByEmail($email);

        // si el usuario existe, y las contraseñas coinciden
        if ($user && password_verify($password, $user->pass)) {
            $this->authHelper->login($user);
            header('Location: ' . BASE_URL);
        } else {
            $msg = " DATOS INCORRECTOS ";
            $this->view->ShowLogin($msg);
        }
    }


    public function logout() {
        $this->authHelper->logout();
    }
    public function Registrar() {
        $this->view->ShowRegistracion();
    }


    public function registracion(){
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $password2 = $_POST['pass2'];
        
        if($password == $password2){
            $clave = password_hash($password, PASSWORD_DEFAULT);
            $this->model->addUsuario($email,$clave);
            //$user = $this->model->getByEmail($email);
            //$this->authHelper->login($user);
            $this->verifyLogin();
            //header('Location: ' . BASE_URL);
        }else{
            $msg = " Las contraseñas no coinciden ";
            $this->view->ShowRegistracion($msg);
        }
       
    } 
}


?>