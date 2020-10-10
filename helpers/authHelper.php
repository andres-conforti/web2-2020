<?php

    class AuthHelper{
        public function __construct() {}

        public function login($user) {
            // INICIO LA SESSION Y LOGUEO AL USUARIO
            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['EMAIL'] = $user->email;
            $_SESSION['ISADMIN'] = $user->isAdmin;
        }

   
        public function logout() {
            session_start();
            session_destroy();
            header('Location: '.LOGIN);
            die();
        }
    
        public function checkLoggedIn() {
            session_start();
            if (!isset($_SESSION['ID_USER'])) {
                header('Location: '.LOGIN);
                die();
            }   
        }

        public function checkAdmin() {

            if ($_SESSION['ISADMIN']==0) {
                session_destroy();
                header('Location: '.LOGIN);
                die();
            }   
        }
    

    
    }

?>