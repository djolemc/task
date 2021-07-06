<?php

require 'config/init.php';

$dbHandle = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$route = str_replace('', "", $_SERVER['REQUEST_URI']);
$route = explode('/', $route);

var_dump($route);

switch ($route[2]) {

    case '':
    case 'index.php':
        $home = new HomeController();
        $home->show();
        break;

    case 'login':
        $login = new HomeController();
        $login->showLoginForm();
        break;

    case 'register':
        $home = new HomeController();
        $home->showRegisterForm();
        break;

    case 'registerUser':
        $user = new UserController($dbHandle);
        $user->register();
        break;

    default:
        include 'Views/404.php';
        break;

}
