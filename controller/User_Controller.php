<?php
require_once './view/User_View.php';
require_once './model/User_Model.php';
class UserController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function verificateLogin(){
        $email = $_POST['email'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $user_info = $this->model->getUser($_POST['email']); #si el email ingresado corresponde con el que se encuentra en la db, se guarda
        
        if (empty($email) || empty($user) || empty($password)) { #si uno o mas de un campo esta vacio
            $this->view->showLogin('falta completar uno o mas campos'); #mando un string de error
        }
        else if (!$user_info || $user != $user_info->usuario || !password_verify( $password,$user_info->contrasenia)) { #se evalua si user_info contiene algo y si el usuario y la contrasenia ingresada corresponde al de la db
            $this->view->showLogin('uno o mas campos incorrectos');
        }
        else { #si esta todo correcto
            session_start(); #se inicia la cesion
            $_SESSION['ID_USER'] = $user_info->id_usuario;
            $_SESSION['EMAIL_USER'] = $user_info->email;

            header('location:'. BASE_URL . 'Home');
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('location:'. BASE_URL . 'Home');
    }
    
}
?>