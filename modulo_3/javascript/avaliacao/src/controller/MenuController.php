<?php
use Moobi\Avaliacao\utils\SessionHandler;

class MenuController {

    public function __construct() {
        $aUsuario = SessionHandler::getUsuario();
        
        if (empty($aUsuario)) {
            header('Location: http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Login/login');
        }
    }

    public function menu(array $aDados): void {
        $aUsuario = SessionHandler::getUsuario();
        include __DIR__ . '/../view/menu.php';
    }
}
?>