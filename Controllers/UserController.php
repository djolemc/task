<?php

require_once 'Models/User.php';

class UserController

{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function register()
    {
        $user = new User($this->db);
        $user->createUser();
        var_dump($user);
        //TODO:
        //        $user->validate()
        $user->saveUser();

        header("Location: index.php");

    }
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //TODO:
        //        $user->validate()
        $user = new User($this->db);
        if ($user->loginUser($email,$password))

        {
            $_SESSION['msg'] = "Welcome, ". $_SESSION['user'];
            header("Location: index.php");
        }

        else {
            $_SESSION['msg'] = "Error loging in. Check your email and password";
            header("Location: login");
        }




    }

}