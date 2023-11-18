<?php
use Moobi\Avaliacao\model\Usuario;
use Moobi\Avaliacao\model\UsuarioDao;
use Moobi\Avaliacao\utils\SessionHandler;
use Moobi\Avaliacao\utils\Validacao;

class UsuarioController {

    /**
     * Verifica se o usuaário está logado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @since 1.0.0
     */
    public function __construct() {
        $aUsuario = SessionHandler::getUsuario();

        if (empty($aUsuario)) {
            header('Location: http://localhost/programa_de_trainee/avaliacao/Login/login');
        }
    }

    /**
     * Verifica se o usuário e administrador e faz a inclusão do formulário de cadastro de usuario
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function save(array $aDados): void {
        $sNivelAcesso = SessionHandler::getNivelAcesso();

        if ($sNivelAcesso !== 'administrador') {
            SessionHandler::setNotificacao('Você não tem permissão para realizar essa operação.');
            header('Location: http://localhost/programa_de_trainee/avaliacao/Usuario/listar');
        }

        $sNotificacao = SessionHandler::getNotificacao();
        
        include __DIR__ . '/../view/cadastrar_usuario.php';
    }

    /**
     * Valida os campos do formulário e salva o usuario no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function cadastrarUsuario(array $aDados): void {
        $sLogin = $aDados['login']; 
        $sSenha = $aDados['senha'];
        $sNivelAcesso = $aDados['nivel_acesso'];

        $bValidacao = $this->validar($sLogin, $sSenha, $sNivelAcesso);

        if (!$bValidacao) {
            header('Location: http://localhost/programa_de_trainee/avaliacao/Usuario/save');
            return;
        } 

        $oUsuario = new Usuario(
            $sLogin,
            $sSenha,
            $sNivelAcesso
        );

        $oUsuarioDao = new UsuarioDao();
        $iResultado = $oUsuarioDao->save($oUsuario);
        
        if ($iResultado > 0) {
            SessionHandler::setNotificacao("Usuario cadastrado com sucesso.");
        } else {
            SessionHandler::setNotificacao("Falha ao cadastar usuario.");
        }

        header('Location: http://localhost/programa_de_trainee/avaliacao/Usuario/listar');
        
    }

    /**
     * Busca e lista os usuarios
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function listar(array $aDados): void {
        $oUsuarioDao = new UsuarioDao;
        $aUsuarios = $oUsuarioDao->findAll();
        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/listar_usuarios.php';
    }

    /**
     * Busca o usuario e faz a inclusão do formulario de edição
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function editar(array $aDados): void {
        $sNivelAcesso = SessionHandler::getNivelAcesso();

        if ($sNivelAcesso !== 'administrador') {
            SessionHandler::setNotificacao('Você não tem permissão para realizar essa operação.');
            header('Location: http://localhost/programa_de_trainee/avaliacao/Usuario/listar');
        }

        $iIdUsuario = $aDados['id'];
        $oUsuarioDao = new UsuarioDao();
        $aUsuario = $oUsuarioDao->findById($iIdUsuario);
        $sNotificacao = SessionHandler::getNotificacao();

        include __DIR__ . '/../view/editar_usuario.php';
    }

    /**
     * Valida os campos do formulário e atualiza o usuario no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function atualizarUsuario(array $aDados): void {
        $sLogin = $aDados['login']; 
        $sSenha = $aDados['senha'];
        $sNivelAcesso = $aDados['nivel_acesso'];
        $iIdUsuario = $aDados['id'];

        $bValidacao = $this->validar($sLogin, $sSenha, $sNivelAcesso);

        if (!$bValidacao) {
            header("Location: http://localhost/programa_de_trainee/avaliacao/Usuario/editar/{$iIdUsuario}");
            return;
        }

        $aUsuario = [
            'login' => $sLogin, 
            'senha' => md5($sSenha),
            'nivel_acesso' => $sNivelAcesso,
            'id' => $iIdUsuario
        ];
        
        $oUsuarioDao = new UsuarioDao();
        $iResultado = $oUsuarioDao->replace($aUsuario);

        if ($iResultado > 0) {
            SessionHandler::setNotificacao('Usuario atulizado com sucesso!');
        } else {
            SessionHandler::setNotificacao('Falha ao atualizar usuario!');
        }
       
        header('Location: http://localhost/programa_de_trainee/avaliacao/Usuario/listar');
    }

    /**
     * Remove um usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aDados
     * @return void
     * 
     * @since 1.0.0
     */
    public function deletarUsuario(array $aDados): void{
        $sNivelAcesso = SessionHandler::getNivelAcesso();

        if ($sNivelAcesso !== 'administrador') {
            SessionHandler::setNotificacao('Você não tem permissão para realizar essa operação.');
        } else {
            $iIdUsuario = $aDados['id'];

            $oUsuarioDao = new UsuarioDao();
            $iResultado = $oUsuarioDao->delete($iIdUsuario);

            if ($iResultado > 0) {
                SessionHandler::setNotificacao('Usuario excluido com sucesso!');
            } else {
                SessionHandler::setNotificacao('Falha ao excluir usuario!');
            }
        }

        header('Location: http://localhost/programa_de_trainee/avaliacao/Usuario/listar');
    }

    /**
     * Valida os dados de um usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sLogin
     * @param string $sSenha
     * @param string $sNivelAcesso
     * @return bool
     * 
     * @since 1.0.0
     */
    private function validar(string $sLogin, string $sSenha, string $sNivelAcesso): bool {
        if (!Validacao::login($sLogin)) {
            SessionHandler::setNotificacao('informe um login válido.');
            return false;
        }

        if (!Validacao::senha($sSenha)) {
            SessionHandler::setNotificacao('Informe uma senha válida.');
            return false;
        }

        if (!Validacao::nivelAcesso($sNivelAcesso)) {
            SessionHandler::setNotificacao('Informe um nivel de acesso válido.');
            return false;
        }

        return true;
    }
}

?>