<?php

    class AuthHelper{
        public function __construct() {
            $this->isLogged();
        }

        public function isLogged() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function login($user) {
            // INICIO LA SESSION Y LOGUEO AL USUARIO
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['EMAIL'] = $user->email;
            $_SESSION['ISADMIN'] = $user->isAdmin;
        }

   
        public function logout() {
            session_destroy();
            header('Location: '.LOGIN);
            die();
        }
    
        public function checkLoggedIn() {
            if(isset($_SESSION["ID_USER"])){
              if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
                $this->logout(); // destruye la sesión, y vuelve al login
              }
                $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
            }
            else{
                header('Location: '.LOGIN);
                die();
            } 
        }


    }


    /*
            checkear si es administrador

            public function checkAdmin() {
            if ($_SESSION['ISADMIN']==0) {
                session_destroy();
                header('Location: '.LOGIN);
                die();
            }   
        }
    
    */
?>