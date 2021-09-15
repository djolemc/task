<?php
session_start();
require_once "config/init.php";

$env = new DotEnv(".env");



DatabaseConnection::connect(getenv("HOST"), getenv("DATABASE"), getenv("USERNAME"), getenv("PASSWORD"));
$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();


$module = $_GET['module'] ?? 'home';
$option = $_GET['option'] ?? 'show';

$moduleName = ucfirst(strtolower($module))."Controller";
$controllerFile = "Controllers/".$moduleName.".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $moduleName($dbc);
    $controller->runAction($option);
}


