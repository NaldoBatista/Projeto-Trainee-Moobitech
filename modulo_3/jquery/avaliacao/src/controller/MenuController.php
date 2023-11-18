<?php
use Moobi\Avaliacao\utils\SessionHandler;

class MenuController {

    /**
     * Verifica se o usuario está logado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @since 1.0.0
     */
    public function __construct() {
        $aUsuario = SessionHandler::getUsuario();
        
        // var_dump($aUsuario);
        // exit();
        
        if (empty($aUsuario)) {
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Login/login');
        }
    }

    /**
     * Faz o inclusão do menu
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function menu(array $aDados): void {
        $aUsuario = SessionHandler::getUsuario();
        include __DIR__ . '/../view/menu.php';
    }
}
?>