<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use Moobi\Avaliacao\model\Usuario;
use Moobi\Avaliacao\model\UsuarioDao;
use Moobi\Avaliacao\utils\SessionHandler;
use Moobi\Avaliacao\utils\Validacao;

class LoginController {

    /**
     * Faz o include do formulario de login
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function login(array $aDados): void {
        $sNotificacao =  SessionHandler::getNotificacao();
        
        include __DIR__ . '/../view/login.php'; 
    }

    /**
     * Valida os campos do formulario e faz a autenticação do usuario o usuário 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function autenticar(array $aDados): void {
        $sLogin = $aDados['login'];
        $sSenha = $aDados['senha'];
        $SenhaHash = md5($aDados['senha']);
        
        $bValidacao = $this->validar($sLogin, $sSenha);

        if (!$bValidacao) {
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Login/login');
            return;
        } 

        $oUsuarioDao = new UsuarioDao();
        $aUsuario = $oUsuarioDao->find($sLogin, $SenhaHash);

        if (!empty($aUsuario)) {
            SessionHandler::login($aUsuario);
            header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Menu/menu');
            return;
        }
        
        SessionHandler::setNotificacao('LOGIN OU SENHA INCORRETA!!');
        header('Location: http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Login/login');

    }

    /**
     * Faz a validação do dados do usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sLogin
     * @param string $sSenha
     * @return bool
     * 
     * @since 1.0.0
     */
    private function validar(string $sLogin, string $sSenha): bool {
        if (!Validacao::login($sLogin)) {
            SessionHandler::setNotificacao('Informe um login válido!');
            return false;
        } 
        
        if (!Validacao::senha($sSenha)) {
            SessionHandler::setNotificacao('Informe uma senha válida!');
            return false;
        }
        
        return true;
    }
}


?>