<?PHP 
namespace Moobi\Avaliacao\utils;

class SessionHandler {

    /**
     * Adiciona uma notificação na sessão
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sNotificacao
     * @return void
     * 
     * @since 1.0.0
     */
    public static function setNotificacao(string $sNotificacao): void {
        session_start();
        $_SESSION['notificacao'] = $sNotificacao;
    } 

    /**
     * Pega a notificação da sessão
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @return string
     * 
     * @since 1.0.0
     */
    public static function getNotificacao(): string {
        session_start();
        if(!empty($_SESSION['notificacao'])) {
            $sNotificacao = $_SESSION['notificacao'];
            $_SESSION['notificacao'] = null;
            return $sNotificacao;
        }
        return '';
    }

    /**
     * Loga um usuário na sessão
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param array $aUsuario
     * @return void
     * 
     * @since 1.0.0
     */
    public static function login(array $aUsuario): void {
        session_start();
        $aUsuario = [
            'login' => $aUsuario['uso_login'],
            'nivel_acesso' => $aUsuario['uso_nivel_acesso']
        ];
        $_SESSION['usuario'] = $aUsuario;
    }

    /**
     * Pega o usuário da sessão
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @return array
     * 
     * @since 1.0.0
     */
    public static function getUsuario(): array {
        session_start();
        if (!empty($_SESSION['usuario'])) {
            return $_SESSION['usuario'];
        }
        return [];
    }

    /**
     * Encerra a sessão
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @return void
     * 
     * @since 1.0.0
     */
    public static function destruirSessao(): void {
        session_start();
        $_SESSION = null;
        session_destroy();
    }

    /**
     * Pega o nével de acesso do usuário da sessão
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @return string
     * 
     * @since 1.0.0
     */
    public static function getNivelAcesso() {
        session_start();
        return $_SESSION['usuario']['nivel_acesso'];
    }

    
}

?>