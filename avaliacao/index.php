<?php
require_once 'src/controller/LoginController.php';
require_once 'src/controller/MenuController.php';
require_once 'src/controller/UsuarioController.php';
require_once 'src/controller/FiliadoController.php';
require_once 'src/controller/DependenteController.php';

$aDados = array_merge($_GET, $_POST);

$sController = $aDados['controller'] ?? 'Login';
$sController .= "Controller";
$sMetodo = $aDados['action'] ?? 'login';

$oClasse = new $sController();
$oClasse->$sMetodo($aDados);


?>