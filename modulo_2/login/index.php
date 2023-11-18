<?php
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/controller/LoginController.php';
require_once 'vendor/autoload.php';
//use Moobi\controller\LoginController;

$aDados = array_merge($_GET, $_POST);

//var_dump($aDados);

$sController = $aDados['controller'];
$sController .= "Controller";
$sMetodo = $aDados['action'];

$oClasse = new $sController();
$oClasse->$sMetodo($aDados);

?>