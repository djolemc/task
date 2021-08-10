<?php

require_once 'Models/User.php';
require_once 'classes/ValidatorWrapper.php';
require_once 'Controllers/Controller.php';

class UserController extends Controller

{


    public function registerUser()
    {
        unset($_SESSION['old_user']);

        $user = new User();
        $user->createUser();


        $validator = new ValidatorWrapper(5, 20);

        if ($user->isRegistered()) {
            $_SESSION['old_user'] = $_POST;

            $_SESSION['mail_error'] = 'User already registered!';
            header("Location: index.php?module=home&option=showRegisterForm");
        };

        if ($validator->validate()) {

            $user->saveUser();
            $user->loginUser($user->getEmail(), $user->getPassword());
            $_SESSION['msg'] = "Welcome, " . $_POST['name'];

            header("Location: index.php");
        } else {
            $_SESSION['old_user'] = $_POST;
            header("Location: index.php?module=home&option=showRegisterForm");

        }
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();

        if ($user->loginUser($email, $password)) {
            $_SESSION['msg'] = "Welcome, " . $_SESSION['user'];
            header("Location: index.php");
        } else {
            $_SESSION['msg'] = "Error loging in. Check your email and password";
            header("Location: index.php?module=home&option=showLoginForm");
        }
    }

    public static function logout()
    {
        session_destroy();
        header("Location: index.php");
    }
}