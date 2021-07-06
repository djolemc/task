<?php

class HomeController {

    public function show()
    {
        include 'Views/home.php';

    }

    public function showRegisterForm()
    {
        include 'Views/register.php';
    }

    public function showLoginForm()
    {
        include 'Views/login.php';
    }

}
