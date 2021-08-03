<?php

require_once 'Models/User.php';


class HomeController
{

    public static function show()
    {
        include 'Views/home.php';
    }

    public static function showRegisterForm()
    {
        include 'Views/register.php';
    }

    public static function showLoginForm()
    {
        include 'Views/login.php';
    }

    public static function showResults($db)

    {

         if (isset($_SESSION['logged_in'])) {
             $search = $_POST['search'];
             $user = new User($db);
             $results = $user->findUsers($search);
             include 'Views/results.php';

        } else {
            $_SESSION['msg'] = "Please login";
            include 'Views/login.php';
        }
    }

}
