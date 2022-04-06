<?php
define('BASEPATH', true);
include_once 'core/Routing.php';
include_once 'core/config.php';
include_once 'Controllers/ProductosController.php';
include_once 'Controllers/UsuariosController.php';

$router=new Routing();
/*var_dump($router->url);
echo "<br>Controlador: $router->controller"; 
echo "<br>Método: $router->method"; 
echo "<br>Param: $router->param";*/
$controller=$router->controller;
$method=$router->method;
$param=$router->param;
session_start();
$controller= new $controller;
$controller->$method($param);
?>