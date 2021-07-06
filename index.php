<?php

require 'config/init.php';


$route = str_replace('index.php', "", $_SERVER['REQUEST_URI']);
$route = explode('/', $route);

var_dump($route);

switch ($route[2]) {

    case '':
    case 'index.php':
    $home = new HomeController();
    $home->show();

        break;

    default:
        include 'Views/404.php';
        break;

}
