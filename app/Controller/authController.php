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
        if (empty($email)||empty($password)) {
        if (empty($email)) {
            $msg = "NO INGRESO EL EMAIL";
        }
        else if (empty($password)) {
            $msg = "NO INGRESO LA CONTRASEÑA";
        }
        $this->view->ShowLogin($msg);
        die();
    } 
        

        // obtengo el usuario
        $user = $this->model->getByEmail($email);

        // si el usuario existe, y las contraseñas coinciden
        if(!empty($user)){
            $passTrue = password_verify($password, $user->pass);
            if(!$passTrue){
                $msg = "CONTRASEÑA INCORRECTA";
                $this->view->ShowLogin($msg);
            }
            else if($user && $passTrue){
                $this->authHelper->login($user);
                header('Location: ' . BASE_URL);
            }
        }
        else{
            $msg = "EL USUARIO NO EXISTE";
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
        
        if(!empty($email)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            if(!empty($password)){
                if($password == $password2){
                    $clave = password_hash($password, PASSWORD_DEFAULT);
                    $this->model->addUsuario($email,$clave);
                    $this->verifyLogin();
                }
                else{
                    $msg = "LAS CONTRASEÑAS NO COINCIDEN";
                    $this->view->ShowRegistracion($msg);
                }
            }
            else{
                $msg = "INGRESE UNA CONTRASEÑA";
                $this->view->ShowRegistracion($msg);
            }

        }
        else{
            $msg = "EMAIL INVALIDO";
            $this->view->ShowRegistracion($msg);
        }
    }
    else{
        $msg = "INGRESE UN EMAIL";
        $this->view->ShowRegistracion($msg);
    }

       
    } 
}


?>