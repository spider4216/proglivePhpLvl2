<?php

require_once __DIR__ . '/autoload.php';
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'Index';

$controllerClassName = $ctrl . 'Controller';
require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';
$controller = new $controllerClassName;

$method = 'action' . $act;
try {
    $controller->$method();
} catch (E404Ecxeption $e) {
    $view = new View();
    $view->error = $e->getMessage();
    header("HTTP/1.0 404 Not Found");
    $view->display('errors/404.php');
}


?>