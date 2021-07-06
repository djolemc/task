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
        header("Location: home");

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
            header("Location: home");
        }

        else {
            $_SESSION['msg'] = "Error loging in. Check your email and password";
            header("Location: login");
        }

    }

    public function findUser()
    {
        $user = new User($this->db);
        $result = $user->findUsers();
        $_SESSION['result'] = $result;

        if (empty($result)) {
            $_SESSION['msg'] = "No results found";
            header("Location: results");
        } else {
            unset($_SESSION['msg']);
            header("Location: results");
        }


    }

}