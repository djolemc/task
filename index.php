<?php
session_start();
require 'config/init.php';

DatabaseConnection::connect($host, $db, $username, $password);


$module = $_GET['module'] ?? 'home';
$option = $_GET['option'] ?? 'show';

$moduleName = ucfirst(strtolower($module))."Controller";
$controllerFile = "Controllers/".$moduleName.".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $moduleName();
    $controller->runAction($option);
}


