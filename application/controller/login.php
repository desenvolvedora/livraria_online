<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author marcio
 */
class Login extends Controller{
    
   function __construct()
    {
        parent::__construct();
    }

    /**
     * Index, default action (shows the login form), when you do login/index
     */
    function index()
    {
        // create a login model to perform the getFacebookLoginUrl() method
        //$login_model = $this->loadModel('Login');
        // show the view
        require 'application/views/_templates/header-login.php';
        require 'application/views/login/index.php';
        require 'application/views/_templates/footer.php';  
    }

    /**
     * The login action, when you do login/login
     */
    function login()
    {
        // run the login() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('LoginModel');
        // perform the login method, put result (true or false) into $login_successful
        $login_successful = $login_model->login();

        // check login status
        if ($login_successful) {
            // if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
            header('location: ' . URL . 'dashboard/index');
        } else {
            // if NO, then move user to login/index (login form) again
            header('location: ' . URL . 'login/index');
        }
    }
    
    function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $login_model = $this->loadModel('LoginModel');
            if ($login_model->registrarNovoUsuario()){
                $message = $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
            }else{
                $message = $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        } 
        
        
        require 'application/views/_templates/header.php';
        require 'application/views/login/registrar.php';
        require 'application/views/_templates/footer.php';         
    }
}
