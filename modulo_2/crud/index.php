<?php
require_once 'controller/EmpresaController.php';

register_shutdown_function(function() {
   print_r(error_get_last()); 
});


$sController = $_GET['controller'] ?? "home";
$sController .= "Controller";

$sMetodo = empty($_GET['action']) ? "index" : $_GET['action'];

$aDados = array_merge($_GET, $_POST);
//var_dump($aDados);

$oController = new $sController;
$oController->$sMetodo($aDados);

//$oController = new EmpresaController();
//var_dump($oController);
//$oController->cadastrarEmpresa();

//$oController = new $sController;
//$oController->cadastrarEmpresa();

// echo "Controller: {$sController}; Metodo: {$sMetodo}";

//$oController = new $sController;

/*
if (empty($oController)) {
   die("Não foi possível definir sua URL: " . $_GET['controller']);
}

if (!method_exists($oController, $sMetodo)) {
   die("Não foi possível definir sua URL: " . $_GET['controller'] . "/{$sMetodo}");
} */

//$aDados = array_merge($_GET, $_POST);
//var_dump($aDados);

//$oController->$sMetodo($aDados);
// var_dump()


/*

class HomeController {
   public function index() {
      echo "Hello Home Index";
   }
}

class EmpresaController {

   public function index() {
      echo "Hello Empresa Index";
   }

   public function editar(array $aDados) {
      var_dump($aDados);
      if (empty($aDados['id'])) {
         die("O ID da emrpesa não foi informado");
      }
      echo "Hello Empresa Editar";
   }
}

*/

?>
