<?php

require_once 'Models/User.php';
require_once 'Controllers/Controller.php';

class UserController extends Controller

{

    public function registerUser()
    {
        unset($_SESSION['old_user']);

        $user = new User();
        $user->createUser();

        $username = $_POST['email'];
        $password = $_POST['password_1'];
        $password_2 = $_POST['password_2'];


        $validator = new Validation();

        if ($user->isRegistered()) {

            $_SESSION['old_user'] = $_POST;
            $_SESSION['mail_error'] = 'User already registered!';
            header("Location: index.php?module=home&option=showRegisterForm");
            exit();
        };


        if (!$validator
            ->addRule(new ValidateMinimum(3))
            ->addRule(new ValidateMaximum(20))
            ->addRule(new ValidateNoEmptySpaces())
            ->addRule(new ValidateSpecialCharacter())
            ->validate($password)) {

//            $_SESSION['validationRules']['errors'] = $validator->getAllErrorMessages();

        }

        if (!$validator
            ->addRule(new ValidateEmail())
            ->validate($username)) {
            echo 'usao';
            $_SESSION['errors'] = $validator->getAllErrorMessages();
            die(var_dump($validator->getAllErrorMessages()));
        }

        var_dump($_SESSION);

        if ($validator) {
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